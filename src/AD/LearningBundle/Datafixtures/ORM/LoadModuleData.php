<?php
// src/AD/LearnigBundle/Datafixtures/ORM

namespace AD\LearningBundle\Datafixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AD\LearningBundle\Entity\Module;
/**
 * Description of LoadModuleData
 *
 * @author adubost
 */
class LoadModuleData implements FixtureInterface
{
    public function load(ObjectManager $manager) {
        $modules_data = array(
            array(
                'module_name' => 'Business Enterprise',
                'short_code' => 'HNDBFMA09'
                ),                
             array(
                'module_name' => 'Career & Self Development',
                'short_code' => 'RDIHCBF004M'
                 ),
             array(
                'module_name' => 'Commercial Relationships for Competitive Advantage',
                'short_code' => 'COLLRDIHCBF011G'
                 ),
             array(
                'module_name' => 'E-Commerce Strategy',
                'short_code' => 'COLLRDIHCBF012G'
                 ),
             array(
                'module_name' => 'Induction (MSc)',
                'short_code' => 'InductionMBARU'
                 ),
             array(
                'module_name' => 'Online Business Systems',
                'short_code' => 'HNDBFMA09HK'
                 ),
             array(
                 
                'module_name' => 'Managing the Human Resource',
                'short_code' => ''
                 ),
             array(
                'module_name' => 'Marketing',
                'short_code' => 'RDIHCBF004MHK'
                 ),
             array(
                'module_name' => 'Induction (Diploma) Service Excellence',
                'short_code' => 'InductionHNDC'
                 ),
             array(
                'module_name' => 'Sales and Marketing - Edexcel ',
                'short_code' => 'RDIHCTT005'
                 ),
             array(
                'module_name' => 'Leading Teams',
                'short_code' => 'UOWMSCMCFP003'
                 ),
             array(
                'module_name' => 'Hospitality Management',
                'short_code' => ''
                 ),
             array(
                'module_name' => 'Taxation',
                'short_code' => 'RACBS006'
                 ),
             array(
                'module_name' => 'Independent Study',
                'short_code' => ''
                 ),
             array(
                'module_name' => 'Networking',
                'short_code' => ''
                 ),
             array(
                'module_name' => 'Common Law',
                'short_code' => 'ARULLBCRL004'
                 ),
             array(
                'module_name' => 'Desarrollo de Destrezas Personales',
                'short_code' => ''
                 ),
             array(
                'module_name' => 'The Staff Room',
                'short_code' => 'ARUMSCTL7003'
                 )
        );
        
        foreach($modules_data as $module_data)
        {
            $module = new Module();
            $module->setModuleName($module_data['module_name']);
            $module->setShortCode($module_data['short_code']);
            
            $manager->persist($module);
        }
        $manager->flush();
    }
}
