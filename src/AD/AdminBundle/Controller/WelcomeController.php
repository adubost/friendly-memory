<?php

namespace AD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     * @Security("has_role('ROLE_USER')")
     */
    public function welcomeAction(Request $request) {

        return $this->render('ADAdminBundle:Welcome:welcome.html.twig');
    }

}
