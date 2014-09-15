<?php

namespace Proces\ServiciosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Servicios
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\ServiciosBundle\Entity\ServiciosRepository")
 */
class Servicios
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
     * @ORM\Column(name="tituloServicio", type="string", length=100)
     * @Assert\NotBlank(message="Debes ponerle un Título")
     */
    private $tituloServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionServicio", type="string", length=45)
     * @Assert\NotBlank(message="Debes poner una descripción")
     */
    private $descripcionServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudioServicio", type="string", length=300)
     * @Assert\NotBlank(message="Falta la Url")
     * @Assert\Url(message="Url inválida")
     */
    private $urlAudioServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlServicio", type="string", length=300)
     * @Assert\NotBlank(message="Falta la Url")
     * @Assert\Url(message="Url inválida")
     */
    private $urlServicio;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Twinpeaks\UserBundle\Entity\User")
     */
    private $usuario;


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
     * Set tituloServicio
     *
     * @param string $tituloServicio
     * @return Servicios
     */
    public function setTituloServicio($tituloServicio)
    {
        $this->tituloServicio = $tituloServicio;

        return $this;
    }

    /**
     * Get tituloServicio
     *
     * @return string 
     */
    public function getTituloServicio()
    {
        return $this->tituloServicio;
    }

    /**
     * Set descripcionServicio
     *
     * @param string $descripcionServicio
     * @return Servicios
     */
    public function setDescripcionServicio($descripcionServicio)
    {
        $this->descripcionServicio = $descripcionServicio;

        return $this;
    }

    /**
     * Get descripcionServicio
     *
     * @return string 
     */
    public function getDescripcionServicio()
    {
        return $this->descripcionServicio;
    }

    /**
     * Set urlAudioServicio
     *
     * @param string $urlAudioServicio
     * @return Servicios
     */
    public function setUrlAudioServicio($urlAudioServicio)
    {
        $this->urlAudioServicio = $urlAudioServicio;

        return $this;
    }

    /**
     * Get urlAudioServicio
     *
     * @return string 
     */
    public function getUrlAudioServicio()
    {
        return $this->urlAudioServicio;
    }

    /**
     * Set urlServicio
     *
     * @param string $urlServicio
     * @return Servicios
     */
    public function setUrlServicio($urlServicio)
    {
        $this->urlServicio = $urlServicio;

        return $this;
    }

    /**
     * Get urlServicio
     *
     * @return string 
     */
    public function getUrlServicio()
    {
        return $this->urlServicio;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Servicios
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
}
