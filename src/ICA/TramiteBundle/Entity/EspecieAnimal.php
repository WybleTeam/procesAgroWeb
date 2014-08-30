<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EspecieAnimal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ICA\TramiteBundle\Entity\EspecieAnimalRepository")
 */
class EspecieAnimal
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
     * @ORM\Column(name="nombreEspecie", type="string", length=45)
     * @Assert\NotBlank(message="Debes ponerle un nombre a la Especie por favor")
     */
    private $nombreEspecie;

   /**
     * @var string
     *
     * @ORM\Column(name="codigoMotivo", type="string", length=45)
     * @Assert\NotBlank(message="Falta el codigo del Motivo")
     */
    private $codigoMotivo;
    
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
     * Set nombreEspecie
     *
     * @param string $nombreEspecie
     * @return EspecieAnimal
     */
    public function setNombreEspecie($nombreEspecie)
    {
        $this->nombreEspecie = $nombreEspecie;

        return $this;
    }

    /**
     * Get nombreEspecie
     *
     * @return string 
     */
    public function getNombreEspecie()
    {
        return $this->nombreEspecie;
    }
    
     /**
     * Set codigoMotivo
     *
     * @param string $codigoMotivo
     * @return MotivoIdentificacion
     */
    public function setCodigoMotivo($codigoMotivo)
    {
        $this->codigoMotivo = $codigoMotivo;

        return $this;
    }
    
     /**
     * Get codigoMotivo
     *
     * @return string 
     */
    public function getCodigoMotivo()
    {
        return $this->codigoMotivo;
    }
    
    public function __toString() 
    {
        return $this->getNombreEspecie();
    }
}
