<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * RangoEdades
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ICA\TramiteBundle\Entity\RangoEdadesRepository")
 */
class RangoEdades
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
     * @ORM\Column(name="nombreRango", type="string", length=45)
     * @Assert\NotBlank(message="Falta el nombre del Rango")
     */
    private $nombreRango;

     /**
     * @var string
     *
     * @ORM\Column(name="codigoMotivo", type="string", length=45)
     * @Assert\NotBlank(message="Falta el codigo del Motivo")
     */
    private $codigoMotivo;

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
     * Set nombreRango
     *
     * @param string $nombreRango
     * @return RangoEdades
     */
    public function setNombreRango($nombreRango)
    {
        $this->nombreRango = $nombreRango;

        return $this;
    }

    /**
     * Get nombreRango
     *
     * @return string 
     */
    public function getNombreRango()
    {
        return $this->nombreRango;
    }
    
     /**
     * Set codigoMotivo
     *
     * @param string $codigoMotivo
     * @return MotivoIdentificacion
     */
    public function setCodigoMotivo($codigoMotivo)
    {
        $this->codigoMotivo = $codigoMotivo;

        return $this;
    }
    
     /**
     * Get codigoMotivo
     *
     * @return string 
     */
    public function getCodigoMotivo()
    {
        return $this->codigoMotivo;
    }
    
    public function __toString() 
    {
        return $this->getNombreRango();
    }
}
