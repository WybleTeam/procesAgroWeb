<?php

namespace Proces\OfertaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertasInstitucionales
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OfertaBundle\Entity\OfertasInstitucionalesRepository")
 */
class OfertasInstitucionales
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
     * @ORM\Column(name="tituloOferta", type="string", length=45)
     */
    private $tituloOferta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionOferta", type="string", length=45)
     */
    private $descripcionOferta;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAudioOferta", type="string", length=45)
     */
    private $urlAudioOferta;

    /**
     * @var string
     *
     * @ORM\Column(name="urlOferta", type="string", length=45)
     */
    private $urlOferta;

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
     * Set tituloOferta
     *
     * @param string $tituloOferta
     * @return OfertasInstitucionales
     */
    public function setTituloOferta($tituloOferta)
    {
        $this->tituloOferta = $tituloOferta;

        return $this;
    }

    /**
     * Get tituloOferta
     *
     * @return string 
     */
    public function getTituloOferta()
    {
        return $this->tituloOferta;
    }

    /**
     * Set descripcionOferta
     *
     * @param string $descripcionOferta
     * @return OfertasInstitucionales
     */
    public function setDescripcionOferta($descripcionOferta)
    {
        $this->descripcionOferta = $descripcionOferta;

        return $this;
    }

    /**
     * Get descripcionOferta
     *
     * @return string 
     */
    public function getDescripcionOferta()
    {
        return $this->descripcionOferta;
    }

    /**
     * Set urlAudioOferta
     *
     * @param string $urlAudioOferta
     * @return OfertasInstitucionales
     */
    public function setUrlAudioOferta($urlAudioOferta)
    {
        $this->urlAudioOferta = $urlAudioOferta;

        return $this;
    }

    /**
     * Get urlAudioOferta
     *
     * @return string 
     */
    public function getUrlAudioOferta()
    {
        return $this->urlAudioOferta;
    }

    /**
     * Set urlOferta
     *
     * @param string $urlOferta
     * @return OfertasInstitucionales
     */
    public function setUrlOferta($urlOferta)
    {
        $this->urlOferta = $urlOferta;

        return $this;
    }

    /**
     * Get urlOferta
     *
     * @return string 
     */
    public function getUrlOferta()
    {
        return $this->urlOferta;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return OfertasInstitucionales
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
