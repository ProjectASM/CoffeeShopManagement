<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController{
/**
 * @Route("/register", name="app_register")
 */
public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager):Response
{
    $user = new User();
    $form = $this->createForm(UserType::class, $user);

    $form->handleRequest($request);
    if($form->isSubmitted()&&$form->isValid()){ 
        //encode the plain password (mã hóa mật khẩu)
        $user->setPassword(
            //băm
            $userPasswordHasher->hashPassword(
                $user,$form->get('password')->getData()
            )
        );

        $user->setRoles(['ROLE_USER']);

        //insert
        $entityManager->persist($user);
        $entityManager->flush();

        //do anything else you need here, like send an email

        //chuyển trang sau khi đăng ký thành công
        return $this->redirectToRoute('app_login');
    }
    
    return $this->render('registration/index.html.twig', [
        'registrationForm' => $form->createView(),
    ]);
    
}
}