<?php

// src/AD/UserBundle/DataFixtures/ORM/LoadUser.php

namespace AD\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AD\UserBundle\Entity\User;

class LoadUser implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $listnames = array('christine', 'aude', 'nick', 'chris', 'matt', 'samir', 'dan');
        foreach ($listnames as $name) {
            $user = new User();
            $user->setUsername($name);
            $user->setPassword($name);
            $user->setSalt('');
            $user->setRoles(array('ROLE_USER'));

            $manager->persist($user);
        }

        $manager->flush();
    }

}
