<?php

namespace AD\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\LearningBundle\Entity\CourseModuleLink;
use AD\LearningBundle\Form\CourseModuleLinkType;


/**
 * Description of CourseModuleController
 *
 * @author adubost
 */
class CourseModuleLinkController extends Controller {

    public function linkAction(Request $request) {

        $courseModuleLink = new CourseModuleLink();

        $form = $this->createForm(CourseModuleLinkType::class, $courseModuleLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($courseModuleLink);
            $em->flush();
        }

        return $this->render('ADLearningBundle:CourseModule:link_course_module.html.twig', array('form' => $form->createView()));
    }

}
