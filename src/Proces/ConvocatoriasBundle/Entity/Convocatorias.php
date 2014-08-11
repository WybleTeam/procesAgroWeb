<?php

namespace Proces\ConvocatoriasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="tituloConvocatoria", type="string", length=45)
     */
    private $tituloConvocatoria;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=45)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="urlConvocatoria", type="string", length=45)
     */
    private $urlConvocatoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionLarga", type="string", length=45)
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
    public function setTituloConvocatorian($tituloConvocatoria)
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
