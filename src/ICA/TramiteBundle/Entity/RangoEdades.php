<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $nombreRango;


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
}
