<?php

namespace Proces\OficinasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oficinas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OficinasBundle\Entity\OficinasRepository")
 */
class Oficinas
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
     * @ORM\Column(name="nombreOficina", type="string", length=45)
     */
    private $nombreOficina;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionOficina", type="string", length=45)
     */
    private $direccionOficina;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionOficina", type="string", length=45)
     */
    private $descripcionOficina;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Twinpeaks\UserBundle\Entity\User")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Proces\OficinasBundle\Entity\Municipio")
     */
    private $municipio;


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
     * Set nombreOficina
     *
     * @param string $nombreOficina
     * @return Oficinas
     */
    public function setNombreOficina($nombreOficina)
    {
        $this->nombreOficina = $nombreOficina;

        return $this;
    }

    /**
     * Get nombreOficina
     *
     * @return string 
     */
    public function getNombreOficina()
    {
        return $this->nombreOficina;
    }

    /**
     * Set direccionOficina
     *
     * @param string $direccionOficina
     * @return Oficinas
     */
    public function setDireccionOficina($direccionOficina)
    {
        $this->direccionOficina = $direccionOficina;

        return $this;
    }

    /**
     * Get direccionOficina
     *
     * @return string 
     */
    public function getDireccionOficina()
    {
        return $this->direccionOficina;
    }

    /**
     * Set descripcionOficina
     *
     * @param string $descripcionOficina
     * @return Oficinas
     */
    public function setDescripcionOficina($descripcionOficina)
    {
        $this->descripcionOficina = $descripcionOficina;

        return $this;
    }

    /**
     * Get descripcionOficina
     *
     * @return string 
     */
    public function getDescripcionOficina()
    {
        return $this->descripcionOficina;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Oficinas
     */
    public function setUsuario(\Twinpeaks\UserBundle\Entity\User $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Oficinas
     */
    public function setMunicipio(\Proces\OficinasBundle\Entity\Municipio $municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}
