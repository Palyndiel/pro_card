<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExperienceRepository")
 */
class Experience
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
     * @ORM\Column(name="title_fr", type="string", length=255, unique=true)
     */
    private $title_fr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_eng", type="string", length=255, unique=true)
     */
    private $title_eng;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="string", length=255)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="description_fr", type="text", nullable=true)
     */
    private $description_fr;

    /**
     * @var string
     *
     * @ORM\Column(name="description_eng", type="text", nullable=true)
     */
    private $description_eng;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isEdu", type="boolean")
     */
    private $isEdu;

    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer")
     */
    private $order;

    /**
     * @return bool
     */
    public function isEdu()
    {
        return $this->isEdu;
    }

    /**
     * @param bool $isEdu
     */
    public function setIsEdu($isEdu)
    {
        $this->isEdu = $isEdu;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return Experience
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getTitleFr()
    {
        return $this->title_fr;
    }

    /**
     * @param string $title_fr
     */
    public function setTitleFr($title_fr)
    {
        $this->title_fr = $title_fr;
    }

    /**
     * @return string
     */
    public function getTitleEng()
    {
        return $this->title_eng;
    }

    /**
     * @param string $title_eng
     */
    public function setTitleEng($title_eng)
    {
        $this->title_eng = $title_eng;
    }

    /**
     * @return string
     */
    public function getDescriptionFr()
    {
        return $this->description_fr;
    }

    /**
     * @param string $description_fr
     */
    public function setDescriptionFr($description_fr)
    {
        $this->description_fr = $description_fr;
    }

    /**
     * @return string
     */
    public function getDescriptionEng()
    {
        return $this->description_eng;
    }

    /**
     * @param string $description_eng
     */
    public function setDescriptionEng($description_eng)
    {
        $this->description_eng = $description_eng;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

}

