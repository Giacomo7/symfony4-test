<?php

namespace App\Controller;

use App\Entity\Gruppo;
use App\Entity\Utente;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service\RandomGeneratorService;

class ProvaController extends Controller{

    private $rgs;
    public function __construct(RandomGeneratorService $rgs){
        $this->rgs = $rgs;
    }

    public function twig($name = ""){
        return $this->render('prova/prova-twig.html.twig', array(
            'name' => $name
        ));
    }

    public function creaUtenti(){
        $entityManager = $this->getDoctrine()->getManager();

        $gruppo = new Gruppo();
        $gruppo->setNome("Gialli");

        $utente1 = new Utente();
        $utente1->setNome("Giacomo");
        $utente1->setCognome("Cardella");
        $utente1->setEmail("giacomo.85@hotmail.it");

        $utente2 = new Utente();
        $utente2->setNome("Pietro");
        $utente2->setCognome("Rossi");
        $utente2->setEmail("pietrorossi@example.com");

        $utente3 = new Utente();
        $utente3->setNome("Mario");
        $utente3->setCognome("Biondi");
        $utente3->setEmail("mariobiondi@example.com");

        $gruppo->addUtenti($utente1);
        $gruppo->addUtenti($utente2);
        $gruppo->addUtenti($utente3);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($gruppo);
        $entityManager->persist($utente1);
        $entityManager->persist($utente2);
        $entityManager->persist($utente3);
        $entityManager->flush();

        return new Response("OK");
    }

    public function provaDoctrine(){

        $utenti = $this->getDoctrine()
            ->getRepository(Utente::class)->findAllRandom();


        return $this->render('prova/prova-doctrine.html.twig', ['utenti' => $utenti]);
    }

    public function provaSymfony(){
        $params['random'] = $this->rgs->getRandom();
        return $this->render('prova/prova-symfony.html.twig', $params);
    }

    public function home(){
        $params['urls'][0] = $this->generateUrl('prova_twig', array('name' => $this->rgs->getRandom()));
        $params['urls'][1] = $this->generateUrl('crea_utenti', array());
        $params['urls'][2] = $this->generateUrl('prova_doctrine', array());
        $params['urls'][3] = $this->generateUrl('prova_symfony', array());

        return $this->render('prova/home.html.twig', $params);
    }
}
?>