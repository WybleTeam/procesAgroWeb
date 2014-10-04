<?php

namespace Proces\OficinasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Municipio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OficinasBundle\Entity\MunicipioRepository")
 */
class Municipio
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
     * @ORM\Column(name="nombreMunicipio", type="string", length=45)
     * @Assert\NotBlank(message="Debes ponerle un nombre")
     * @Assert\Length(
     *      min = "2",
     *      max = "45",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $nombreMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoMunicipio", type="string", length=45)
     * @Assert\NotBlank(message="Debes poner un Tipo")
     * @Assert\Length(
     *      min = "2",
     *      max = "45",
     *      minMessage = "El campo debe ser mayor a {{ limit }} caracteres de largo",
     *      maxMessage = "El campo no puede tener más de {{ limit }} caracteres de largo"
     * )
     */
    private $tipoMunicipio;
 
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Proces\OficinasBundle\Entity\Departamento")
     * @Assert\NotBlank(message="Debes Escoger un departamento")
     */
    private $departamento;

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
     * Set nombreMunicipio
     *
     * @param string $nombreMunicipio
     * @return Municipio
     */
    public function setNombreMunicipio($nombreMunicipio)
    {
        $this->nombreMunicipio = $nombreMunicipio;

        return $this;
    }

    /**
     * Get nombreMunicipio
     *
     * @return string 
     */
    public function getNombreMunicipio()
    {
        return $this->nombreMunicipio;
    }

    /**
     * Set tipoMunicipio
     *
     * @param string $tipoMunicipio
     * @return Municipio
     */
    public function setTipoMunicipio($tipoMunicipio)
    {
        $this->tipoMunicipio = $tipoMunicipio;

        return $this;
    }

    /**
     * Get tipoMunicipio
     *
     * @return string 
     */
    public function getTipoMunicipio()
    {
        return $this->tipoMunicipio;
    }

     /**
     * Set departamento
     *
     * @param string $departamento
     * @return Municipio
     */
    public function setDepartamento(\Proces\OficinasBundle\Entity\Departamento $departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    
    public function __toString() 
    {
        return $this->getNombreMunicipio()." (".$this->getDepartamento().")";
    }
}
