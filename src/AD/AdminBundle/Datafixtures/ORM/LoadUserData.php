<?php
// src/AD/AdminBundle/Datafixtures/ORM/LoadUserData.php

namespace AD\AdminBundle\Datafixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use AD\AdminBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface
{
  
      // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $users_data = array(
        array(
            'firstname' => 'Christine',
            'surname' =>   'Theodoridou',
            'gender' => 'f',
            'username' => 'christine',
            'password' => 'christine'
            ),
        array(
            'firstname' => 'Aude',
            'surname' =>   'Dubost',
            'gender' => 'f',
            'username' => 'aude',
            'password' => 'aude'
        ),
        array(
            'firstname' => 'Nick',
            'surname' =>   'Swift',
            'gender' => 'm',
            'username' => 'nick',
            'password' => 'nick'
        ),
        array(
            'firstname' => 'Chris',
            'surname' =>   'Bucin',
            'gender' => 'm',
            'username' => 'chris',
            'password' => 'chris'  
        ),
        array(
            'firstname' => 'Matt',
            'surname' =>   'Asbury',
            'gender' => 'm',
            'username' => 'matt',
            'password' => 'matt'  
        ),
        array(
            'firstname' => 'Samir',
            'surname' =>   'Patel',
            'gender' => 'm',
            'username' => 'samir',
            'password' => 'samir'  
        ),
        array(
            'firstname' => 'Dan',
            'surname' =>   'Skora',
            'gender' => 'm',
            'username' => 'dan',
            'password' => 'dan'  
        )
        );
        
      
    
    foreach ($users_data as $user_data) {
      
      $user = new User();
      $user->setFirstname($user_data['firstname']);
      $user->setSurname($user_data['surname']);
      $user->setGender($user_data['gender']);
      $user->setUsername($user_data['username']);
      $user->setPassword($user_data['password']);

      $manager->persist($user);
    }
    
    $manager->flush();
  }
    
    
}
