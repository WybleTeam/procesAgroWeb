<?php

namespace Proces\ConvocatoriasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Convocatorias
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\ConvocatoriasBundle\Entity\ConvocatoriasRepository")
 */
class Convocatorias
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
     * @ORM\Column(name="tituloConvocatoria", type="string", length=100)
     * @Assert\NotBlank(message="Debes ponerle un Título a la convocatoria")
     * @Assert\Length(
     *      min = "2",
     *      max = "100",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $tituloConvocatoria;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=40)
     * @Assert\NotBlank(message="Describe brevemente la convocatoria")
     * @Assert\Length(
     *      min = "2",
     *      max = "40",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudio", type="string", length=300, nullable=true)
     *
     *
     */
    private $urlAudio;

    
    /**
     * @var string
     *
     * @ORM\Column(name="urlConvocatoria", type="string", length=300)
     * @Assert\NotBlank(message="Hey la Url!!")
     * @Assert\Url(message="Pon una url por ejemplo, http://tuurl.com")
     *      * @Assert\Length(
     *      min = "2",
     *      max = "300",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $urlConvocatoria;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcionLarga", type="string", length=150)
     * @Assert\NotBlank(message="La descripción larga falta")
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $descripcionLarga;

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
     * Set tituloConvocatoria
     *
     * @param string $tituloConvocatoria
     * @return Convocatorias
     */
    public function setTituloConvocatoria($tituloConvocatoria)
    {
        $this->tituloConvocatoria = $tituloConvocatoria;

        return $this;
    }

    /**
     * Get tituloConvocatoria
     *
     * @return string 
     */
    public function getTituloConvocatoria()
    {
        return $this->tituloConvocatoria;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Convocatorias
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
     /**
     * Set urlAudio
     *
     * @param string $urlAudio
     * @return Convocatorias
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
     * Set urlConvocatoria
     *
     * @param string $urlConvocatoria
     * @return Convocatorias
     */
    public function setUrlConvocatoria($urlConvocatoria)
    {
        $this->urlConvocatoria = $urlConvocatoria;

        return $this;
    }

    /**
     * Get urlConvocatoria
     *
     * @return string 
     */
    public function getUrlConvocatoria()
    {
        return $this->urlConvocatoria;
    }

    /**
     * Set descripcionLarga
     *
     * @param string $descripcionLarga
     * @return Convocatorias
     */
    public function setDescripcionLarga($descripcionLarga)
    {
        $this->descripcionLarga = $descripcionLarga;

        return $this;
    }

    /**
     * Get descripcionLarga
     *
     * @return string 
     */
    public function getDescripcionLarga()
    {
        return $this->descripcionLarga;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Convocatorias
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
