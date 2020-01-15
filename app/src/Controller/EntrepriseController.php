<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//use Symfony\Component\BrowserKit\Request;
//use Symfony\Component\HttpFoundation\Request

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request, EntrepriseRepository $entrepriseRepository)
    {
        return $this->render('controller_entreprise/index.html.twig', [
            'controller_name'=> 'liste des entreprises',
            'entreprises'=>$entrepriseRepository->findAll()
        ]);
    }

    /**
     * @Route("/formulaire", name="form_entreprise")
     */
    public function new(Request $request, EntrepriseRepository $entrepriseRepository)
    {

        $em         = $this->getDoctrine()->getManager();
        $entreprise = new Entreprise();
        $form       = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entreprise = $form->getData();
            $em->persist($entreprise);
            $em->flush();
            
           
        }
        return $this->render('controller_entreprise/form_entreprise.twig', [
            'form' => $form->createView(),
            'entreprises'=>$entrepriseRepository->findAll()
        ]);
    }
    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(Entreprise $id, Request $request, EntrepriseRepository $entrepriseRepository)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return $this->render('controller_entreprise/index.html.twig', [
            'controller_name'=> 'liste des entreprises',
            'entreprises'=>$entrepriseRepository->findAll()
        ]);
    }
   /**
     * @Route("/geolocalisation", name="geolocalisation", methods="GET")
     */
    public function geolocalisation(Request $request, EntrepriseRepository $entrepriseRepository)
    {
        $featuresType='Feature';
        $featureType='Point';
        $espg = 'EPSG:3857';
        $crsType = 'name';
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $siteListe = $entrepriseRepository->findAll();
        foreach ($siteListe as $site) {
            $adresse = $site->getAdresse(). " " .$site->getCodePostal()." ".$site->getVille();
            $features[] = array('type' => $featuresType,
                                'geometry' => array('type' => $featureType,
                                                    'coordinates' => [$site->getLongitude(), $site->getLatitude()]),
                                'properties'=>array('adresse'=>$adresse,
                                                    'Nom'=>$site->getNom(),
                                                    'sujet'=>$site->getSujet(),
                                                    'filiere'=>$site->getFiliere(),
                                                    'date'=>$site->getDate(),
                                                    'code_APE'=>$site->getCodeApe(),
                                                    'CA'=>$site->getChiffreDAffaire() 
                                ));
        }
        $geoJsonObject = array('type' => 'FeatureCollection', 'crs' => array('type' => $crsType, 'properties' => array('name' =>  $espg)), 'features' => $features);
        $json = $serializer->serialize($geoJsonObject, 'json');
        $response = JsonResponse::fromJsonString($json, Response::HTTP_OK, ['Access-Control-Allow-Origin' => '*']);
        return $response;
    }
}


