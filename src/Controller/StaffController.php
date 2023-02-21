<?php

namespace App\Controller;

use App\Entity\Staff;
use App\Form\StaffType;
use App\Repository\StaffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/staff")
 */
class StaffController extends AbstractController
{
    private StaffRepository $repo;
    public function __construct(StaffRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="staffPage")
     */
    public function staffPageAction(): Response
    {
        $staff = $this->repo->findAll();
        return $this->render('staff/index.html.twig', [
            'staff'=>$staff
        ]);
    }

    /**
     * @Route("/{id}", name="staffRead",requirements={"id"="\d+"})
     */
    public function showAction(Staff $s): Response
    {
        return $this->render('detail.html.twig', [
            's'=>$s
        ]);
    }

    /**
    * @Route("/add", name="staffAdd",requirements={"id"="\d+"})
    */
    public function addAction(Request $req, SluggerInterface $slugger): Response
    {
        $s = new Staff();
        $form = $this->createForm(StaffType::class, $s);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $imgFile = $form->get('file')->getData();
         if ($imgFile) {
             $newFilename = $this->uploadImage($imgFile,$slugger);
             $s->setImage($newFilename);
         }
         $this->repo->add($s,true);
         return $this->redirectToRoute('staffPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("staff/form.html.twig",[
         'form' => $form->createView()
        ]);
     }

    /**
    * @Route("/edit/{id}", name="staffEdit",requirements={"id"="\d+"})
    */
   public function editAction(Request $req, Staff $s, SluggerInterface $slugger): Response
   {
       $form = $this->createForm(StaffType::class, $s);   

       $form->handleRequest($req);
       if($form->isSubmitted() && $form->isValid()){
        $imgFile = $form->get('file')->getData();
        if ($imgFile) {
            $newFilename = $this->uploadImage($imgFile,$slugger);
            $s->setImage($newFilename);
        }
        $this->repo->add($s,true);
        return $this->redirectToRoute('staffPage', [], Response::HTTP_SEE_OTHER);
    }
    return $this->render("staff/form.html.twig",[
        'form' => $form->createView()
    ]);
}

    public function uploadImage($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
        try {
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFilename
            );
        } catch (FileException $e) {
            echo $e;
        }
        return $newFilename;
    }

    /**
     * @Route("/delete/{id}",name="staffDelete",requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, Staff $s): Response
    {
        $this->repo->remove($s,true);
        return $this->redirectToRoute('staffPage', [], Response::HTTP_SEE_OTHER);
    }
}
