<?php

namespace App\Controller;

use App\Entity\Timekeeping;
use App\Form\TimekeepingType;
use App\Repository\TimekeepingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/timekeeping")
 */
class TimekeepingController extends AbstractController
{
    private TimekeepingRepository $repo;
    public function __construct(TimekeepingRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="timekeepingPage")
     */
    public function timekeepingAction(): Response
    {
        $timekeeping = $this->repo->findAll();
        return $this->render('timekeeping/index.html.twig', [
            'timekeeping' => $timekeeping
        ]);
    }

    /**
    * @Route("/add", name="timekeepingAdd",requirements={"id"="\d+"})
    */
    public function addAction(Request $req, SluggerInterface $slugger): Response
    {
        $tk = new Timekeeping();
        $form = $this->createForm(TimekeepingType::class, $tk);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($tk,true);
         return $this->redirectToRoute('timekeepingPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('timekeeping/form.html.twig',[
         'form' => $form->createView()
        ]);
     }

    /**
     * @Route("/delete/{id}",name="timekeepingDelete",requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, Timekeeping $tk): Response
    {
        $this->repo->remove($tk,true);
        return $this->redirectToRoute('timekeepingPage', [], Response::HTTP_SEE_OTHER);
    }
}
