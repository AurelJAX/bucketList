<?php


namespace App\Controller;


use App\Entity\Wish;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    /**
     * @Route("/liste", name="app_liste")
     */
    public function liste(EntityManagerInterface $em, WishRepository $wr): Response{
        //Ajout des wish
       /* $wish = new Wish();
        $wish->setTitle("Sauver la planète")
            ->setDescription("Participer à plein de projet en faveur de la défense de la nature")
            ->setAuthor("Aurélien")
            ->setIsPublished(true)
            ->setDateCreated(new \DateTime('now'));*/

        // Persistence
            #$em->persist($wish);
           # $em->flush();
        #dd($wr->findByTitle("Sauver la planète"));
        #dd($wr->findByAuthor("Aurélien"));

        $wishList = $wr->findALl();
        $tab = compact('wishList');
      # dd($tab);
        return $this->render('wish/list.html.twig', $tab);
    }

    /**
     * @Route("/detail/{{id}}", name="app_details")
     */
    public function details($id=0, WishRepository $wr): Response{
        #dd($id);
        $wish = $wr->find($id);
        $tabs = compact('wish');
        return $this->render('wish/detail.html.twig', $tabs);
    }


}