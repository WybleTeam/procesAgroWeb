<?php

namespace Proces\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OfertasInstitucionalesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OfertasInstitucionalesRepository extends EntityRepository
{
    public function findPasos()
    {
        
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT o,p FROM OfertaBundle:OfertasInstitucionales o 
            LEFT JOIN o.pasos p
            '
        );
        
        $resultado = $consulta->getArrayResult();
        return $resultado;
    }
    
    public function findOfertastotal()
    {
        
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT o FROM OfertaBundle:OfertasInstitucionales o');
        
        $resultado = $consulta->getArrayResult();
        return $resultado;
    }
    
    public function findConvocatoriasConteo()
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT COUNT(o) AS Cuenta FROM OfertaBundle:OfertasInstitucionales o');
        $resultado = $consulta->getArrayResult();
        return $resultado;
    }
}
