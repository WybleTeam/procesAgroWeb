<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Seccionales
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ICA\TramiteBundle\Entity\SeccionalesRepository")
 */
class Seccionales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreSeccional", type="string", length=45)
     * @Assert\NotBlank(message="Falta el nombre de la seccional")
     */
    private $nombreSeccional;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;


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
     * Set nombreSeccional
     *
     * @param string $nombreSeccional
     * @return Seccionales
     */
    public function setNombreSeccional($nombreSeccional)
    {
        $this->nombreSeccional = $nombreSeccional;

        return $this;
    }

    /**
     * Get nombreSeccional
     *
     * @return string 
     */
    public function getNombreSeccional()
    {
        return $this->nombreSeccional;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Seccionales
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function __toString() 
    {
        return $this->getNombreSeccional();
    }
}
