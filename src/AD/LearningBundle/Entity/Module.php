<?php

namespace AD\LearningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity(repositoryClass="AD\LearningBundle\Repository\ModuleRepository")
 */
class Module
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

  /**
     * @var string
     *
     * @ORM\Column(name="module_name", type="string", length=255)
     * @Assert\Length(min=5) 
     */
    private $moduleName;
    
   /**
     * @var string
     *
     * @ORM\Column(name="short_code", type="string", nullable=true)
     */
    private $shortCode;
     

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set moduleName
     *
     * @param string $moduleName
     * @return Module
     */
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;

        return $this;
    }

    /**
     * Get moduleName
     *
     * @return string 
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * Set shortCode
     *
     * @param string $shortCode
     * @return Module
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    /**
     * Get shortCode
     *
     * @return string 
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }
}
