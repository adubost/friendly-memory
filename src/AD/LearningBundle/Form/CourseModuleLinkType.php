<?php

namespace AD\LearningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AD\LearningBundle\Entity\CourseModuleLink;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CourseModuleLinkType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('courses', EntityType::class, array(
                        'class' => 'ADLearningBundle:Course',
                        'property' => 'courseName'
                            ))
                ->add('modules', EntityType::class, array(
                        'class' => 'ADLearningBundle:Module',
                        'property' => 'moduleName'
                    ))
                ->add('weighting', 'integer')
                ->add('Link', 'submit');
                              
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CourseModuleLink::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ad_learningbundle_coursemodulelink';
    }


}
