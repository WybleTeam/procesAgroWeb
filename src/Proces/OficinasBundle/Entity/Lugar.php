<?php

namespace Proces\OficinasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lugar
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OficinasBundle\Entity\LugarRepository")
 */
class Lugar
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
     * @ORM\Column(name="nombreLugar", type="string", length=45)
     */
    private $nombreLugar;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoLugar", type="string", length=45)
     */
    private $tipoLugar;


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
     * Set nombreLugar
     *
     * @param string $nombreLugar
     * @return Lugar
     */
    public function setNombreLugar($nombreLugar)
    {
        $this->nombreLugar = $nombreLugar;

        return $this;
    }

    /**
     * Get nombreLugar
     *
     * @return string 
     */
    public function getNombreLugar()
    {
        return $this->nombreLugar;
    }

    /**
     * Set tipoLugar
     *
     * @param string $tipoLugar
     * @return Lugar
     */
    public function setTipoLugar($tipoLugar)
    {
        $this->tipoLugar = $tipoLugar;

        return $this;
    }

    /**
     * Get tipoLugar
     *
     * @return string 
     */
    public function getTipoLugar()
    {
        return $this->tipoLugar;
    }
}
