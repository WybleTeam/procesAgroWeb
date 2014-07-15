<?php

namespace ICA\TramiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $nombreEspecie;


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
}
