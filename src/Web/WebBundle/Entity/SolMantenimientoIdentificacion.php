<?php

namespace Web\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolMantenimientoIdentificacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Web\WebBundle\Entity\SolMantenimientoIdentificacionRepository")
 */
class SolMantenimientoIdentificacion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSolicitud", type="datetime")
     */
    private $fechaSolicitud;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Proces\OficinasBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ICA\TramiteBundle\Entity\Seccionales")
     */
    private $seccional;

    /**
     * @var string
     *
     * @ORM\Column(name="justificacionReidentificacion", type="string", length=45)
     */
    private $justificacionReidentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitudMantenimientoIdentificacion", type="string", length=45)
     */
    private $solicitudMantenimientoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ica_3_101", type="string", length=45)
     */
    private $ica3101;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreFinca", type="string", length=45)
     */
    private $nombreFinca;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrePropietarioFinca", type="string", length=45)
     */
    private $nombrePropietarioFinca;

    /**
     * @var string
     *
     * @ORM\Column(name="cedulaPropietarioFinca", type="string", length=45)
     */
    private $cedulaPropietarioFinca;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoFijoPropietario", type="string", length=45)
     */
    private $telefonoFijoPropietario;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoCelularPropietario", type="string", length=45)
     */
    private $telefonoCelularPropietario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreSolicitante", type="string", length=45)
     */
    private $nombreSolicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="cedulaSolicitante", type="string", length=45)
     */
    private $cedulaSolicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoFijoSolicitante", type="string", length=45)
     */
    private $telefonoFijoSolicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoCelularSolicitante", type="string", length=45)
     */
    private $telefonoCelularSolicitante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaProgramadaIdentificacion", type="datetime")
     */
    private $fechaProgramadaIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observacionesRevision", type="string", length=45)
     */
    private $observacionesRevision;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Twinpeaks\UserBundle\Entity\User")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoSolicitud", type="string", length=255)
     */
    private $estadoSolicitud;


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
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return SolMantenimientoIdentificacion
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return SolMantenimientoIdentificacion
     */
    public function setMunicipio(\Proces\OficinasBundle\Entity\Municipio $municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set seccional
     *
     * @param string $seccional
     * @return SolMantenimientoIdentificacion
     */
    public function setSeccional(\ICA\TramiteBundle\Entity\Seccionales $seccional)
    {
        $this->seccional = $seccional;

        return $this;
    }

    /**
     * Get seccional
     *
     * @return string 
     */
    public function getSeccional()
    {
        return $this->seccional;
    }

    /**
     * Set justificacionReidentificacion
     *
     * @param string $justificacionReidentificacion
     * @return SolMantenimientoIdentificacion
     */
    public function setJustificacionReidentificacion($justificacionReidentificacion)
    {
        $this->justificacionReidentificacion = $justificacionReidentificacion;

        return $this;
    }

    /**
     * Get justificacionReidentificacion
     *
     * @return string 
     */
    public function getJustificacionReidentificacion()
    {
        return $this->justificacionReidentificacion;
    }

    /**
     * Set solicitudMantenimientoIdentificacion
     *
     * @param string $solicitudMantenimientoIdentificacion
     * @return SolMantenimientoIdentificacion
     */
    public function setSolicitudMantenimientoIdentificacion($solicitudMantenimientoIdentificacion)
    {
        $this->solicitudMantenimientoIdentificacion = $solicitudMantenimientoIdentificacion;

        return $this;
    }

    /**
     * Get solicitudMantenimientoIdentificacion
     *
     * @return string 
     */
    public function getSolicitudMantenimientoIdentificacion()
    {
        return $this->solicitudMantenimientoIdentificacion;
    }

    /**
     * Set ica3101
     *
     * @param string $ica3101
     * @return SolMantenimientoIdentificacion
     */
    public function setIca3101($ica3101)
    {
        $this->ica3101 = $ica3101;

        return $this;
    }

    /**
     * Get ica3101
     *
     * @return string 
     */
    public function getIca3101()
    {
        return $this->ica3101;
    }

    /**
     * Set nombreFinca
     *
     * @param string $nombreFinca
     * @return SolMantenimientoIdentificacion
     */
    public function setNombreFinca($nombreFinca)
    {
        $this->nombreFinca = $nombreFinca;

        return $this;
    }

    /**
     * Get nombreFinca
     *
     * @return string 
     */
    public function getNombreFinca()
    {
        return $this->nombreFinca;
    }

    /**
     * Set nombrePropietarioFinca
     *
     * @param string $nombrePropietarioFinca
     * @return SolMantenimientoIdentificacion
     */
    public function setNombrePropietarioFinca($nombrePropietarioFinca)
    {
        $this->nombrePropietarioFinca = $nombrePropietarioFinca;

        return $this;
    }

    /**
     * Get nombrePropietarioFinca
     *
     * @return string 
     */
    public function getNombrePropietarioFinca()
    {
        return $this->nombrePropietarioFinca;
    }

    /**
     * Set cedulaPropietarioFinca
     *
     * @param string $cedulaPropietarioFinca
     * @return SolMantenimientoIdentificacion
     */
    public function setCedulaPropietarioFinca($cedulaPropietarioFinca)
    {
        $this->cedulaPropietarioFinca = $cedulaPropietarioFinca;

        return $this;
    }

    /**
     * Get cedulaPropietarioFinca
     *
     * @return string 
     */
    public function getCedulaPropietarioFinca()
    {
        return $this->cedulaPropietarioFinca;
    }

    /**
     * Set telefonoFijoPropietario
     *
     * @param string $telefonoFijoPropietario
     * @return SolMantenimientoIdentificacion
     */
    public function setTelefonoFijoPropietario($telefonoFijoPropietario)
    {
        $this->telefonoFijoPropietario = $telefonoFijoPropietario;

        return $this;
    }

    /**
     * Get telefonoFijoPropietario
     *
     * @return string 
     */
    public function getTelefonoFijoPropietario()
    {
        return $this->telefonoFijoPropietario;
    }

    /**
     * Set telefonoCelularPropietario
     *
     * @param string $telefonoCelularPropietario
     * @return SolMantenimientoIdentificacion
     */
    public function setTelefonoCelularPropietario($telefonoCelularPropietario)
    {
        $this->telefonoCelularPropietario = $telefonoCelularPropietario;

        return $this;
    }

    /**
     * Get telefonoCelularPropietario
     *
     * @return string 
     */
    public function getTelefonoCelularPropietario()
    {
        return $this->telefonoCelularPropietario;
    }

    /**
     * Set nombreSolicitante
     *
     * @param string $nombreSolicitante
     * @return SolMantenimientoIdentificacion
     */
    public function setNombreSolicitante($nombreSolicitante)
    {
        $this->nombreSolicitante = $nombreSolicitante;

        return $this;
    }

    /**
     * Get nombreSolicitante
     *
     * @return string 
     */
    public function getNombreSolicitante()
    {
        return $this->nombreSolicitante;
    }

    /**
     * Set cedulaSolicitante
     *
     * @param string $cedulaSolicitante
     * @return SolMantenimientoIdentificacion
     */
    public function setCedulaSolicitante($cedulaSolicitante)
    {
        $this->cedulaSolicitante = $cedulaSolicitante;

        return $this;
    }

    /**
     * Get cedulaSolicitante
     *
     * @return string 
     */
    public function getCedulaSolicitante()
    {
        return $this->cedulaSolicitante;
    }

    /**
     * Set telefonoFijoSolicitante
     *
     * @param string $telefonoFijoSolicitante
     * @return SolMantenimientoIdentificacion
     */
    public function setTelefonoFijoSolicitante($telefonoFijoSolicitante)
    {
        $this->telefonoFijoSolicitante = $telefonoFijoSolicitante;

        return $this;
    }

    /**
     * Get telefonoFijoSolicitante
     *
     * @return string 
     */
    public function getTelefonoFijoSolicitante()
    {
        return $this->telefonoFijoSolicitante;
    }

    /**
     * Set telefonoCelularSolicitante
     *
     * @param string $telefonoCelularSolicitante
     * @return SolMantenimientoIdentificacion
     */
    public function setTelefonoCelularSolicitante($telefonoCelularSolicitante)
    {
        $this->telefonoCelularSolicitante = $telefonoCelularSolicitante;

        return $this;
    }

    /**
     * Get telefonoCelularSolicitante
     *
     * @return string 
     */
    public function getTelefonoCelularSolicitante()
    {
        return $this->telefonoCelularSolicitante;
    }

    /**
     * Set fechaProgramadaIdentificacion
     *
     * @param \DateTime $fechaProgramadaIdentificacion
     * @return SolMantenimientoIdentificacion
     */
    public function setFechaProgramadaIdentificacion($fechaProgramadaIdentificacion)
    {
        $this->fechaProgramadaIdentificacion = $fechaProgramadaIdentificacion;

        return $this;
    }

    /**
     * Get fechaProgramadaIdentificacion
     *
     * @return \DateTime 
     */
    public function getFechaProgramadaIdentificacion()
    {
        return $this->fechaProgramadaIdentificacion;
    }

    /**
     * Set observacionesRevision
     *
     * @param string $observacionesRevision
     * @return SolMantenimientoIdentificacion
     */
    public function setObservacionesRevision($observacionesRevision)
    {
        $this->observacionesRevision = $observacionesRevision;

        return $this;
    }

    /**
     * Get observacionesRevision
     *
     * @return string 
     */
    public function getObservacionesRevision()
    {
        return $this->observacionesRevision;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return SolMantenimientoIdentificacion
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

    /**
     * Set estadoSolicitud
     *
     * @param string $estadoSolicitud
     * @return SolMantenimientoIdentificacion
     */
    public function setEstadoSolicitud($estadoSolicitud)
    {
        $this->estadoSolicitud = $estadoSolicitud;

        return $this;
    }

    /**
     * Get estadoSolicitud
     *
     * @return string 
     */
    public function getEstadoSolicitud()
    {
        return $this->estadoSolicitud;
    }
}
