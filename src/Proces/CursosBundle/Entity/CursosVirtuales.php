<?php

namespace Proces\CursosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\ManyToOne(targetEntity="Twinpeaks\UserBundle\Entity\User")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreCurso", type="string", length=100)
     * @Assert\NotBlank(message="Falta el nombre del Curso")
     * @Assert\Length(
     *      min = "2",
     *      max = "100",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $nombreCurso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionCurso", type="string", length=45)
     * @Assert\NotBlank(message="Descripcion del Curso")
     * @Assert\Length(
     *      min = "2",
     *      max = "400",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $descripcionCurso;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudio", type="string", length=300, nullable=true)
     */
    private $urlAudio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlCurso", type="string", length=300)
     * @Assert\NotBlank(message="Enlace a la convocatoria")
     * @Assert\Url(message="Formato inválido")
     * @Assert\Length(
     *      min = "2",
     *      max = "300",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $urlCurso;

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
     * Set usuario
     *
     * @param string $usuario
     * @return CursosVirtuales
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
