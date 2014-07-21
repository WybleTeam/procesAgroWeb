<?php

namespace Proces\OficinasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proces\OficinasBundle\Entity\DepartamentoRepository")
 */
class Departamento
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
     * @ORM\Column(name="nombreDepartamento", type="string", length=45)
     */
    private $nombreDepartamento;


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
     * Set nombreDepartamento
     *
     * @param string $nombreDepartamento
     * @return Departamento
     */
    public function setNombreDepartamento($nombreDepartamento)
    {
        $this->nombreDepartamento = $nombreDepartamento;

        return $this;
    }

    /**
     * Get nombreDepartamento
     *
     * @return string 
     */
    public function getNombreDepartamento()
    {
        return $this->nombreDepartamento;
    }
}
