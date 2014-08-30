<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MotivoIdentificacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ICA\TramiteBundle\Entity\MotivoIdentificacionRepository")
 */
class MotivoIdentificacion
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
     * @ORM\Column(name="nombreMotivo", type="string", length=45)
     * @Assert\NotBlank(message="Falta el nombre del Motivo")
     */
    private $nombreMotivo;

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
     * Set nombreMotivo
     *
     * @param string $nombreMotivo
     * @return MotivoIdentificacion
     */
    public function setNombreMotivo($nombreMotivo)
    {
        $this->nombreMotivo = $nombreMotivo;

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
     * Get nombreMotivo
     *
     * @return string 
     */
    public function getNombreMotivo()
    {
        return $this->nombreMotivo;
    }
    
    public function __toString() 
    {
        return $this->getNombreMotivo();
    }
}
