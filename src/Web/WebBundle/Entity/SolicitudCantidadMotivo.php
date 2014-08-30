<?php

namespace Web\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SolicitudCantidadMotivo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Web\WebBundle\Entity\SolicitudCantidadMotivoRepository")
 */
class SolicitudCantidadMotivo
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
     * @ORM\ManyToOne(targetEntity="ICA\TramiteBundle\Entity\MotivoIdentificacion")
     * @Assert\NotBlank(message="Escoge")
     */
    private $motivoIdentificacion;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Web\WebBundle\Entity\SolMantenimientoIdentificacion",inversedBy="cantidadMotivo", cascade={"persist"})
     * @Assert\NotBlank()
     */
    private $solicitudMantenimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     * @Assert\NotBlank(message="Escribe un valor")
     * @Assert\Type(type="integer")
     */
    private $cantidad;


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
     * Set motivoIdentificacion
     *
     * @param string $motivoIdentificacion
     * @return SolicitudCantidadMotivo
     */
    public function setMotivoIdentificacion(\ICA\TramiteBundle\Entity\MotivoIdentificacion $motivoIdentificacion)
    {
        $this->motivoIdentificacion = $motivoIdentificacion;

        return $this;
    }

    /**
     * Get motivoIdentificacion
     *
     * @return string 
     */
    public function getMotivoIdentificacion()
    {
        return $this->motivoIdentificacion;
    }

    /**
     * Set solicitudMantenimiento
     *
     * @param string $solicitudMantenimiento
     * @return SolicitudCantidadMotivo
     */
    public function setSolicitudMantenimiento(\Web\WebBundle\Entity\SolMantenimientoIdentificacion $solicitudMantenimiento)
    {
        $this->solicitudMantenimiento = $solicitudMantenimiento;

        return $this;
    }

    /**
     * Get solicitudMantenimiento
     *
     * @return string 
     */
    public function getSolicitudMantenimiento()
    {
        return $this->solicitudMantenimiento;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return SolicitudCantidadMotivo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
