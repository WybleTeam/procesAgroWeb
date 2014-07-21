<?php

namespace Proces\CursosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursosVirtuales
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\CursosBundle\Entity\CursosVirtualesRepository")
 */
class CursosVirtuales
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
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreCurso", type="string", length=45)
     */
    private $nombreCurso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionCurso", type="string", length=45)
     */
    private $descripcionCurso;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudio", type="string", length=45)
     */
    private $urlAudio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlCurso", type="string", length=45)
     */
    private $urlCurso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
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
     * Set usuario
     *
     * @param string $usuario
     * @return CursosVirtuales
     */
    public function setUsuario($usuario)
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
     * Set nombreCurso
     *
     * @param string $nombreCurso
     * @return CursosVirtuales
     */
    public function setNombreCurso($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;

        return $this;
    }

    /**
     * Get nombreCurso
     *
     * @return string 
     */
    public function getNombreCurso()
    {
        return $this->nombreCurso;
    }

    /**
     * Set descripcionCurso
     *
     * @param string $descripcionCurso
     * @return CursosVirtuales
     */
    public function setDescripcionCurso($descripcionCurso)
    {
        $this->descripcionCurso = $descripcionCurso;

        return $this;
    }

    /**
     * Get descripcionCurso
     *
     * @return string 
     */
    public function getDescripcionCurso()
    {
        return $this->descripcionCurso;
    }

    /**
     * Set urlAudio
     *
     * @param string $urlAudio
     * @return CursosVirtuales
     */
    public function setUrlAudio($urlAudio)
    {
        $this->urlAudio = $urlAudio;

        return $this;
    }

    /**
     * Get urlAudio
     *
     * @return string 
     */
    public function getUrlAudio()
    {
        return $this->urlAudio;
    }

    /**
     * Set urlCurso
     *
     * @param string $urlCurso
     * @return CursosVirtuales
     */
    public function setUrlCurso($urlCurso)
    {
        $this->urlCurso = $urlCurso;

        return $this;
    }

    /**
     * Get urlCurso
     *
     * @return string 
     */
    public function getUrlCurso()
    {
        return $this->urlCurso;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return CursosVirtuales
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
}
