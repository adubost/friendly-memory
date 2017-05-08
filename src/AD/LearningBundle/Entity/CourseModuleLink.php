<?php

// src/AD/LearningBundle/Entity/CourseMOduleLink.php

namespace AD\LearningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AD\LearningBundle\Entity\Course;
use AD\LearningBundle\Entity\Module;

/**
 * Module
 *
 * @ORM\Table(name="course_module_link")
 * @ORM\Entity(repositoryClass="AD\LearningBundle\Repository\CourseModuleLinkRepository")
 */
class CourseModuleLink {

  
    /**
     * @ORM\ManyToOne(targetEntity="AD\LearningBundle\Entity\Module")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Id
     */
    private $module;

    /**
     * @ORM\ManyToOne(targetEntity="AD\LearningBundle\Entity\Course")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Id
     */
    private $course;

    /**
     * @var int
     *
     * @ORM\Column(name="weighting", type="integer")
     */
    private $weighting;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set weighting
     *
     * @param integer $weighting
     * @return CourseModuleLink
     */
    public function setWeighting($weighting) {
        $this->weighting = $weighting;

        return $this;
    }

    /**
     * Get weighting
     *
     * @return integer 
     */
    public function getWeighting() {
        return $this->weighting;
    }

    /**
     * Set module
     *
     * @param \AD\LearningBundle\Entity\Module $module
     * @return CourseModuleLink
     */
    public function setModules(\AD\LearningBundle\Entity\Module $module) {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AD\LearningBundle\Entity\Module 
     */
    public function getModules() {
        return $this->module;
    }

    /**
     * Set course
     *
     * @param \AD\LearningBundle\Entity\Course $course
     * @return CourseModuleLink
     */
    public function setCourses(\AD\LearningBundle\Entity\Course $course) {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \AD\LearningBundle\Entity\Course 
     */
    public function getCourses() {
        return $this->course;
    }

}
