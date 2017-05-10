<?php

// src/AD/LearningBundle/Controller/ModuleController.php

namespace AD\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\LearningBundle\Entity\Module;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Description of ModuleController
 *
 * @author adubost
 */
class ModuleController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createAction(Request $request) {

        $module = new Module();

        $formbuilder = $this->get('form.factory')->createBuilder('form', $module);

        $formbuilder->add('moduleName', TextType::class)
                ->add('shortCode', TextType::class)
                ->add('submit', SubmitType::class);

        $form = $formbuilder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $module = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();
        }
        return $this->render('ADLearningBundle:Module:create_module.html.twig', array('form' => $form->createView()));
    }

    public function editAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('ADLearningBundle:Module');
        $list_modules = $repository->findAll();
        return $this->render('ADLearningBundle:Module:edit_modules.html.twig', array('list_modules' => $list_modules));
    }

}
