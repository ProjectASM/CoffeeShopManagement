<?php

namespace App\Controller;

use App\Entity\Staff;
use App\Repository\ProductRepository;
use App\Repository\StaffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
//     private ProductRepository $repo;
//     public function __construct(ProductRepository $repo)
//    {
//       $this->repo = $repo;
//    }
//     /**
//      * @Route("/", name="homepage")
//      */
//     public function indexPageAction(): Response
//     {
//         $products = $this->repo->findAll();
//         return $this->render('home.html.twig', [
//             'products'=>$products
//         ]);
//     }

    private StaffRepository $repo;
    public function __construct(StaffRepository $repo)
    {
    $this->repo = $repo;
    }
    /**
     * @Route("/", name="homepage")
     */
    public function indexPageAction(): Response
    {
        $staff = $this->repo->findAll();
        return $this->render('home.html.twig', [
            'staff'=>$staff
        ]);
    }

     /**
     * @Route("/admin", name="adminPage")
     */
    public function adminPageAction(): Response{
        return $this->render('admin.html.twig', [
            
        ]);
    }

    // /**
    //  * @Route("/search/{name}", name="searchByName")
    //  */
    // public function searchByNameAction(string $name): Response
    // {
    //     $search = $this->repo->searchByName($name);
    //     return $this->render('home.html.twig', [
    //         'search'=>$search
    //     ]);
    //     // return $this->json($search);
    // }

}
