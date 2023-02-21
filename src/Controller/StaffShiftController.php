<?php

namespace App\Controller;

use App\Entity\StaffShift;
use App\Form\StaffShiftType;
use App\Repository\StaffShiftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/staff-shift")
 */
class StaffShiftController extends AbstractController
{
    private StaffShiftRepository $repo;
    public function __construct(StaffShiftRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="staffshiftPage")
     */
    public function staffshiftPageAction(): Response
    {
        $staffshift = $this->repo->findAll();
        return $this->render('staff_shift/index.html.twig', [
            'staffshift' => $staffshift
        ]);
    }

    /**
    * @Route("/add", name="staffshiftAdd",requirements={"id"="\d+"})
    */
    public function addAction(Request $req, SluggerInterface $slugger): Response
    {
        $stsf = new StaffShift();
        $form = $this->createForm(StaffShiftType::class, $stsf);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($stsf,true);
         return $this->redirectToRoute('staffshiftPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('staff_shift/form.html.twig',[
         'form' => $form->createView()
        ]);
     }

    /**
     * @Route("/delete/{id}",name="staffshiftDelete",requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, StaffShift $stsf): Response
    {
        $this->repo->remove($stsf,true);
        return $this->redirectToRoute('staffshiftPage', [], Response::HTTP_SEE_OTHER);
    }
}
