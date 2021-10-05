<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\AddIdeaType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
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
