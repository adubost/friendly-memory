<?php

// src/AD/UserBundle/Controller/SecurityController.php

namespace AD\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
/**
 * Description of SecurityController
 *
 * @author adubost
 */
class SecurityController extends Controller{
    
    public function loginAction(Request $request){
        
            // Si le visiteur est déjà identifié, on le redirige vers la liste des couses
        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('ad_admin_welcome');
        }
        
        $authenticationUtils = $this->get('security.authentication_utils');
        
        return $this->render('ADUserBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUserName(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ));
    }
 
}
