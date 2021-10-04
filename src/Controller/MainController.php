<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function home(): Response{
     /*   $menu=[
            ["Home", "app_home"],
            ["Contact", "app_contact"],
            ["About Us", "app_aboutUs"],
            ["Legal-Stuff", "app_legal"],
            ["Home", "app_home"],
        ];*/
       return $this->render('main/index.html.twig', [
           'controller_name' => 'MainController',

       ]);
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response{

        return $this->render('main/contact.html.twig');
    }

    /**
     * @Route("/aboutUs", name="app_aboutUs")
     */
    public function aboutUs(): Response{

        return $this->render('main/aboutUs.html.twig');
    }

    /**
     * @Route("/legal-stuff", name="app_legal")
     */
    public function legal_stuff(): Response{

        return $this->render('legal/legal_stuff.html.twig');
    }


}
