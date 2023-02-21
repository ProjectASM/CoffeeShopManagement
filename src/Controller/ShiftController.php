<?php

namespace App\Controller;

use App\Entity\Shift;
use App\Form\ShiftType;
use App\Repository\ShiftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/shift")
 */
class ShiftController extends AbstractController
{
    private ShiftRepository $repo;
    public function __construct(ShiftRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="shiftPage")
     */
    public function shiftPageAction(): Response
    {
        $shift = $this->repo->findAll();
        return $this->render('shift/index.html.twig', [
            'shift'=>$shift
        ]);
    }

    /**
    * @Route("/add", name="shiftAdd",requirements={"id"="\d+"})
    */
    public function addAction(Request $req, SluggerInterface $slugger): Response
    {
        $sf = new Shift();
        $form = $this->createForm(ShiftType::class, $sf);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($sf,true);
         return $this->redirectToRoute('shiftPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('shift/form.html.twig',[
         'form' => $form->createView()
        ]);
     }
    
     /**
    * @Route("/edit/{id}", name="shiftEdit",requirements={"id"="\d+"})
    */
    public function editAction(Request $req, Shift $sf, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ShiftType::class, $sf);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($sf,true);
         return $this->redirectToRoute('shiftPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('shift/form.html.twig',[
         'form' => $form->createView()
        ]);
     }

    /**
     * @Route("/delete/{id}",name="shiftDelete",requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, Shift $sf): Response
    {
        $this->repo->remove($sf,true);
        return $this->redirectToRoute('shiftPage', [], Response::HTTP_SEE_OTHER);
    }
}
