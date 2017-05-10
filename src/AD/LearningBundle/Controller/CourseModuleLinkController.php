<?php

namespace AD\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\LearningBundle\Entity\CourseModuleLink;
use AD\LearningBundle\Form\CourseModuleLinkType;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Description of CourseModuleController
 *
 * @author adubost
 */
class CourseModuleLinkController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function linkAction(Request $request) {

        $courseModuleLink = new CourseModuleLink();
        $message = null;
        $state = null;

        $form = $this->createForm(CourseModuleLinkType::class, $courseModuleLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction(); // suspend auto-commit
            
            try {
                $em->persist($courseModuleLink);
                $em->flush();
                $em->getConnection()->commit();
                $message = 'This module is now linked to this course';
                $state = 'alert-success';
            } catch (UniqueConstraintViolationException $e) {
                $em->getConnection()->rollBack();
                $message = 'This module is already linked to this course';
                $state = 'alert-danger';
            }
        }

        return $this->render('ADLearningBundle:CourseModule:link_course_module.html.twig', array(
                    'form' => $form->createView(),
                    'error_message' => $message,
                    'state' => $state,
        ));
    }

}
