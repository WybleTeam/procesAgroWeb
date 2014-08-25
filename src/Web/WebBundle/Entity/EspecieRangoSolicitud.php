<?php

namespace Web\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EspecieRangoSolicitud
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Web\WebBundle\Entity\EspecieRangoSolicitudRepository")
 */
class EspecieRangoSolicitud
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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ICA\TramiteBundle\Entity\RangoEdades")
     */
    private $rangoEdades;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ICA\TramiteBundle\Entity\EspecieAnimal")
     */
    private $especieAnimal;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Web\WebBundle\Entity\SolMantenimientoIdentificacion", inversedBy="especieRango")
     */
    private $solicitudMantenimiento;


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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return EspecieRangoSolicitud
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

    /**
     * Set rangoEdades
     *
     * @param string $rangoEdades
     * @return EspecieRangoSolicitud
     */
    public function setRangoEdades(\ICA\TramiteBundle\Entity\RangoEdades $rangoEdades)
    {
        $this->rangoEdades = $rangoEdades;

        return $this;
    }

    /**
     * Get rangoEdades
     *
     * @return string 
     */
    public function getRangoEdades()
    {
        return $this->rangoEdades;
    }

    /**
     * Set especieAnimal
     *
     * @param string $especieAnimal
     * @return EspecieRangoSolicitud
     */
    public function setEspecieAnimal(\ICA\TramiteBundle\Entity\EspecieAnimal $especieAnimal)
    {
        $this->especieAnimal = $especieAnimal;

        return $this;
    }

    /**
     * Get especieAnimal
     *
     * @return string 
     */
    public function getEspecieAnimal()
    {
        return $this->especieAnimal;
    }

    /**
     * Set solicitudMantenimiento
     *
     * @param string $solicitudMantenimiento
     * @return EspecieRangoSolicitud
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
}
