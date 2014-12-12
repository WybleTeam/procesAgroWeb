<?php

namespace Proces\OfertaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PasosOferta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OfertaBundle\Entity\PasosOfertaRepository")
 */
class PasosOferta
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
     * @ORM\Column(name="tituloPasos", type="string", length=80)
     * @Assert\NotBlank(message="Debes ponerle un Título")
     * @Assert\Length(
     *      min = "2",
     *      max = "80",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $tituloPasos;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionPaso", type="text", length=400)
     * @Assert\NotBlank(message="Debes ponerle una Descripción")
     * @Assert\Length(
     *      min = "2",
     *      max = "400",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $descripcionPaso;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPaso", type="string", length=300, nullable=true)
     */
    private $urlPaso;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Proces\OfertaBundle\Entity\OfertasInstitucionales", inversedBy="pasos", cascade={"persist"})
     */
    private $ofertaInstitucional;


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
     * Set tituloPasos
     *
     * @param string $tituloPasos
     * @return PasosOferta
     */
    public function setTituloPasos($tituloPasos)
    {
        $this->tituloPasos = $tituloPasos;

        return $this;
    }

    /**
     * Get tituloPasos
     *
     * @return string 
     */
    public function getTituloPasos()
    {
        return $this->tituloPasos;
    }

    /**
     * Set descripcionPaso
     *
     * @param string $descripcionPaso
     * @return PasosOferta
     */
    public function setDescripcionPaso($descripcionPaso)
    {
        $this->descripcionPaso = $descripcionPaso;

        return $this;
    }

    /**
     * Get descripcionPaso
     *
     * @return string 
     */
    public function getDescripcionPaso()
    {
        return $this->descripcionPaso;
    }

    /**
     * Set urlPaso
     *
     * @param string $urlPaso
     * @return PasosOferta
     */
    public function setUrlPaso($urlPaso)
    {
        $this->urlPaso = $urlPaso;

        return $this;
    }

    /**
     * Get urlPaso
     *
     * @return string 
     */
    public function getUrlPaso()
    {
        return $this->urlPaso;
    }

    /**
     * Set ofertaInstitucional
     *
     * @param string $ofertaInstitucional
     * @return PasosOferta
     */
    public function setOfertaInstitucional(\Proces\OfertaBundle\Entity\OfertasInstitucionales $ofertaInstitucional)
    {
        $this->ofertaInstitucional = $ofertaInstitucional;

        return $this;
    }

    /**
     * Get ofertaInstitucional
     *
     * @return string 
     */
    public function getOfertaInstitucional()
    {
        return $this->ofertaInstitucional;
    }
}
