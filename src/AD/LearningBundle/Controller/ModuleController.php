<?php
// src/AD/LearningBundle/Controller/ModuleController.php

namespace AD\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\LearningBundle\Entity\Module;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;


/**
 * Description of ModuleController
 *
 * @author adubost
 */
class ModuleController extends Controller{
    
    public function createAction(Request $request){
        
        $module = new Module();
        
        $formbuilder = $this->get('form.factory')->createBuilder('form', $module);
        
        $formbuilder->add('moduleName', TextType::class )
                ->add('shortCode', TextType::class)
                ->add('submit', SubmitType::class);
        
        $form = $formbuilder->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            
           $module = $form->getData();
           $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();
            
       }
        return $this->render('ADLearningBundle:Module:create_module.html.twig', array('form' =>$form->createView()) );
     }
    
     
     public function linkAction(Request $request){
         //get all the modules
         //get all the courses
         $repositoryModule = $this->getDoctrine()->getRepository('ADLearningBundle:Module');
         $list_modules = $repositoryModule ->findAll();
         
         $repositoryCourses = $this->getDoctrine()->getRepository('ADLearningBundle:Course');
         $list_courses = $repositoryCourses->findAll();
 
        //create the forms
        
        
         //if it is submitted and valid
            //persist in the database
         
         return $this->render('ADLearningBundle:Module:link_module.html.twig', array(
             'list_modules' => $list_modules,
             'list_courses' => $list_courses
         ));
     }
}
