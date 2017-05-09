<?php

//src/AD/LearningBundle/Controller/CourseController.php

namespace AD\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AD\LearningBundle\Entity\CourseModuleLink;
use Symfony\Component\HttpFoundation\Request;
use AD\LearningBundle\Entity\Course;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CourseController extends Controller {

    public function editAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('ADLearningBundle:Course');
        $list_courses = $repository->findAll();
        return $this->render('ADLearningBundle:Course:edit_courses.html.twig', array('list_courses' => $list_courses));
    }

    
    /**
     * 
     * @param Request $request
     * @return type
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createAction(Request $request) {
     

        //check if the user has ROLE_ADMIN 
//    if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
//        // Else we throw a denid exception
//      throw new AccessDeniedException('Acces limited to the administrators');
//    }


        $course = new Course();

        $formbuilder = $this->get('form.factory')->createBuilder('form', $course);

        $formbuilder->add('course_name', 'text')
                ->add('course_level', 'integer')
                ->add('submit', 'submit');

        $form = $formbuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $course = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();
        }

        return $this->render('ADLearningBundle:Course:create_course.html.twig', array('form' => $form->createView()));
    }

    public function edit_one_courseAction($id) {

        $course = new Course();
        $repositoryCourse = $this->getDoctrine()->getManager()->getRepository('ADLearningBundle:Course');
        $course = $repositoryCourse->find($id);

        $repositoryCourseModule = $this->getDoctrine()->getManager()->getRepository('ADLearningBundle:CourseModuleLink');
        $modules = $repositoryCourseModule->findAllModulesByCourse($course);

        return $this->render('ADLearningBundle:Course:edit_one_course.html.twig', array(
                    'id' => $id,
                    'course' => $course,
                    'modules' => $modules
        ));
    }

}
