<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use App\Repository\IngredientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/ingredient")
 */
class IngredientController extends AbstractController
{
    private IngredientRepository $repo;
    public function __construct(IngredientRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="ingredientPage")
     */
    public function ingredientPageAction(): Response
    {
        $ingredient = $this->repo->findAll();
        return $this->render('ingredient/index.html.twig', [
            'ingredient' => $ingredient
        ]);
    }

    /**
    * @Route("/add", name="ingredientAdd",requirements={"id"="\d+"})
    */
    public function addAction(Request $req, SluggerInterface $slugger): Response
    {
        $ing = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ing);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($ing,true);
         return $this->redirectToRoute('ingredientPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('ingredient/form.html.twig',[
         'form' => $form->createView()
        ]);
     }
    
    /**
    * @Route("/edit/{id}", name="ingredientEdit",requirements={"id"="\d+"})
    */
    public function editAction(Request $req, Ingredient $ing,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(IngredientType::class, $ing);   
 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
         $this->repo->add($ing,true);
         return $this->redirectToRoute('ingredientPage', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('ingredient/form.html.twig',[
         'form' => $form->createView()
        ]);
     }

    /**
     * @Route("/delete/{id}",name="ingredientDelete",requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, Ingredient $ing): Response
    {
        $this->repo->remove($ing,true);
        return $this->redirectToRoute('ingredientPage', [], Response::HTTP_SEE_OTHER);
    }
}
