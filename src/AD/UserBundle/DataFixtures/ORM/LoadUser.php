<?php

// src/AD/UserBundle/DataFixtures/ORM/LoadUser.php

namespace AD\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AD\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUser implements FixtureInterface, ContainerAwareInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {


        $listnames = array('christine', 'aude', 'nick', 'chris', 'matt', 'samir', 'dan');
        foreach ($listnames as $name) {
            $user = new User();
            $user->setUsername($name);
            $encoder = $this->container->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $name);
            $user->setPassword($password);
            $user->setSalt('');
            $user->setRoles(array('ROLE_USER'));
            $user->setUsernameCanonical($name);
            $user->setEmail($name . '@' . $name . '.com');
            $user->setEnabled(true);

            $manager->persist($user);
        }

        $user_admin = new User();
        $user_admin->setUsername('admin');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user_admin, 'admin');
        $user_admin->setPassword($password);
        $user_admin->setSalt('');
        $user_admin->setRoles(array('ROLE_ADMIN'));
        $user_admin->setUsernameCanonical($name);
        $user_admin->setEmail('admin@admin.com');
        $user_admin->setEnabled(true);

        $manager->persist($user_admin);

        $manager->flush();
    }

}
