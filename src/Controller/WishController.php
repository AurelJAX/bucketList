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

class WishController extends AbstractController
{
    /**
     * @Route("/liste", name="app_liste")
     */
    public function liste(EntityManagerInterface $em, WishRepository $wr): Response{
        //Ajout des wish
       /* $wish = new Wish();
        $wish->setTitle("Sauver la planète")
            ->setDescription("Participer à plein de projets en faveur de la défense de la nature")
            ->setAuthor("Aurélien")
            ->setIsPublished(true)
            ->setDateCreated(new \DateTime('now'));*/

        // Persistence
            #$em->persist($wish);
           # $em->flush();
        #dd($wr->findByTitle("Sauver la planète"));
        #dd($wr->findByAuthor("Aurélien"));

        $wishList = $wr->findAllWithCategory();
        $tab = compact('wishList');
        #dd($tab);
        return $this->render('wish/list.html.twig', $tab);
    }

    /**
     * @Route("/detail/{{id}}", name="app_details")
     */
    public function details($id, WishRepository $wr): Response{
        #dd($id);
        $wish = $wr->find($id);
        $tabs = compact('wish');
        return $this->render('wish/detail.html.twig', $tabs);
    }

    /**
     *
     * @Route("/ajout", name="app_ajout")
     */
    public function ajout(Request $request, EntityManagerInterface $em): Response{
        $idea = new Wish();
        $form = $this->createForm(AddIdeaType::class, $idea);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           // var_dump($idea);
            $em->persist($idea);
            $em->flush();

            //var_dump($idea);
            $this->addFlash('success', 'Un rêve à réaliser en plus! Réver, c\'est être vivant');
            return $this->redirectToRoute('app_details', [
                                         'id'=> $idea->getId()]);
        }


        return $this->render('main/ajout.html.twig', [
            'form'=>$form->createView()
        ]);
    }


}