<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/setentreprise", name="controller_entreprise")
     */
    public function index(EntityManagerInterface $em)
    {


        $a = new Entreprise();
        $a->setNom('Normandie WebSchool');
        $a->setAdresse('72 Rue de la République');
        $a->setVille('Le Petit-Quevilly');
        $a->setCodePostal('76140');
        $a->setCodeApe('8542Z');
        $a->setChiffreDAffaire('228 200.00 €');
        $a->setFiliere('POINT(49.4286436 1.065732)');
        $a->setComplimentaire('Stage');
        $a->setPosteOcccupe('Chef de projet');
        $a->setCordonnees('POINT(49.4286436 1.065732)');
        
        $a->setSujet('Site E-commerce');
        $a->setDate(new \DateTime());
    
        $em->persist($a);

        $em->flush();

        $a = new Entreprise();
        $a->setNom('Normandie WebSchool');
        $a->setAdresse('72 Rue de la République');
        $a->setVille('Le Petit-Quevilly');
        $a->setCodePostal('76140');
        $a->setCodeApe('8542Z');
        $a->setChiffreDAffaire('228 200.00 €');
        $a->setFiliere('POINT(49.4286436 1.065732)');
        $a->setComplimentaire('Stage');
        $a->setPosteOcccupe('Chef de projet');
        $a->setCordonnees('POINT(49.4286436 1.065732)');
        
        $a->setSujet('Site E-commerce');
        $a->setDate(new \DateTime());
    
        $em->persist($a);

        $em->flush();
         $a = new Entreprise();
        $a->setNom('Normandie WebSchool');
        $a->setAdresse('72 Rue de la République');
        $a->setVille('Le Petit-Quevilly');
        $a->setCodePostal('76140');
        $a->setCodeApe('8542Z');
        $a->setChiffreDAffaire('228 200.00 €');
        $a->setFiliere('POINT(49.4286436 1.065732)');
        $a->setComplimentaire('Stage');
        $a->setPosteOcccupe('Chef de projet');
        $a->setCordonnees('POINT(49.4286436 1.065732)');
        
        $a->setSujet('Site E-commerce');
        $a->setDate(new \DateTime());
    
        $em->persist($a);

        $em->flush();

        return new Response();
    }


     /**
     * @Route("/getentreprises", name="get_entreprises")
     */
   /* public function getEntreprises(EntityManagerInterface $em)
    {
        $entreprises = $em->getRepository(Entreprise::class)->findAll();
        //var_dump($entreprises);
        // ...convertir le tableau entreprise en format json et je le passe dans response
      
$encoders = [ new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = new Serializer($normalizers, $encoders);
$json = $serializer->serialize($entreprises, 'json');
      var_dump($json);
      
        return new Response($json);
        
    }*/
    /**
     * @Route("/formulaire", name="form_entreprise")
     */
public function formulaire_entreprise(){
    return $this->render('controller_entreprise/form_entreprise.twig',[
        'controller_name' => "formulaire",
        'name' => "entreprise"
    ]);
}
}
