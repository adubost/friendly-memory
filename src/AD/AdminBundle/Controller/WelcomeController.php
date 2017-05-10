<?php

namespace AD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends Controller {

    public function welcomeAction(Request $request) {

        return $this->render('ADAdminBundle:Welcome:welcome.html.twig');
    }

}
