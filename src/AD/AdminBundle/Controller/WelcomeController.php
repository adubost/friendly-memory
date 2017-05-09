<?php

namespace AD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\AdminBundle\Entity\User;
use AD\AdminBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Session\Session;

class WelcomeController extends Controller {

    public function addAction(Request $request) {
        //redirection vers la view Home page
        return $this->render('ADAdminBundle::welcome.html.twig');
    }

    public function welcomeAction(Request $request) {

        //Redirection vers la view login
//        $user = new User();
//        $form = $this->createForm(new UserLoginType(), $user);
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $user = $form->getData();
//
//            //database check
//            //if user exists :
//            $repository = $this->getDoctrine()->getRepository('ADAdminBundle:User');
//            $query_user = $repository->findOneBy(
//                    array('username' => $user->getUsername(),
//                        'password' => $user->getPassword()
//            ));
//
//            if ($query_user) {
//                $session = $request->getSession();
//                $session->set('user_name', $user->getUsername());
//                return $this->redirectToRoute('ad_learning_edit_courses');
//            }
//            $session = $request->getSession();
//            $session->clear();
//            return $this->redirectToRoute('ad_admin_welcome');
//        }
//        return $this->render('ADAdminBundle:Welcome:welcome.html.twig', array(
//                    'form' => $form->createView()
//        ));
         return $this->render('ADAdminBundle:Welcome:welcome.html.twig');
        //   }
    }

}
