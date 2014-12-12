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
     * @ORM\Column(name="tituloServicio", type="string", length=80)
     * @Assert\NotBlank(message="Debes ponerle un Título")
     * @Assert\Length(
     *      min = "2",
     *      max = "80",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * ) 
     */
    private $tituloServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionServicio", type="string", length=150)
     * @Assert\NotBlank(message="Debes poner una descripción")
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $descripcionServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudioServicio", type="string", length=300, nullable=true)
     * @Assert\Length(
     *      max = "300",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    
    private $urlAudioServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="urlServicio", type="string", length=300)
     * @Assert\NotBlank(message="Falta la Url")
     * @Assert\Url(message="Url inválida")
     * @Assert\Length(
     *      min = "2",
     *      max = "300",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )     
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
