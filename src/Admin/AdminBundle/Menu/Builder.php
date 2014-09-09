<?php

namespace Admin\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    
    
     public function frontenedMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
       
        //$menu->setLabelAttribute('class', 'span');
        $menu->addChild('Inicio', array('route' => 'web_homepage'))->setLabel('Inicio')->setAttribute('icon','icon-user');                     
        $menu->addChild('Convocatorias', array('route' => 'convocatorias_homepage'))->setAttribute('icon','icon-trophy');
        $menu->addChild('Servicios', array('route' => 'servicios_homepage'))->setLabel('Servicios')->setAttribute('icon','icon-picture');              
        $menu->addChild('Ofertas', array('route' => 'oferta_homepage'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Cursos', array('route' => 'proces_cursos_homepage'))->setLabel('Cursos Virtuales')->setAttribute('icon','icon-doc-text');              
        $menu->addChild('Admin', array('route' => 'admin_homepage'))->setLabel('Administrador')->setAttribute('icon','fa fa-dashboard');   
        $menu->addChild('tramitePublico', array('route' => 'solmantenimiento_new'))->setLabel('Tramite Especial')->setAttribute('icon','fa fa-dashboard');   
        
       
        return $menu;
    }
    
    
    public function serviciosMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
        $menu->addChild('Servicios', array('route' => 'servicios'))->setAttribute('icon','fa fa-th');     
               
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th'); 
       
        return $menu;
    }
   
    public function convocatoriasMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
        $menu->addChild('Convocatorias', array('route' => 'convocatorias'))->setLinkAttribute('icon','fa fa-th');       
        
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th');
        
        return $menu;
    }


    public function ofertasMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Oferta Institucional',array('route'=>'ofertasinstitucionales')); 
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th');

        return $menu;
    }
    
    public function oficinasMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Oficinas', array('route' => 'oficinas_admin'))->setAttribute('icon','fa fa-th'); 
        $menu->addChild('Localizacion',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('class','treeview')->setLinkAttribute('icon','fa fa-table');
        $menu['Localizacion']->setChildrenAttribute('class', 'treeview-menu');
        $menu['Localizacion']->addChild('Departamentos', array('route'=>'departamento'));
        $menu['Localizacion']->addChild('Municipios', array('route'=>'municipio'));
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th');  
       
        return $menu;
    }

    public function solicitudesMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');              
        $menu->addChild('TramiteICA',array('uri'=>'#'))->setAttribute('class', 'treeview')->setAttribute('icon','fa fa-table')->setLinkAttribute('class','treeview')->setLinkAttribute('data-toggle','dropdown');
        $menu['TramiteICA']->setChildrenAttribute('class', 'treeview-menu');
        $menu['TramiteICA']->addChild('Solicitudes', array('route'=>'solmantenimientoidentificacion'));
        $menu['TramiteICA']->addChild('Estados', array('route'=>'estado'));
        $menu['TramiteICA']->addChild('Seccionales', array('route'=>'seccionales'));
        $menu['TramiteICA']->addChild('Especie Animal', array('route'=>'especieanimal'));
        $menu['TramiteICA']->addChild('Rango Edades', array('route'=>'rangoedades'));
        $menu['TramiteICA']->addChild('Motivo Identificacion', array('route'=>'motivoidentificacion'));
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th');  

        return $menu;
    }

    public function tramitesMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Solicitudes', array('route' => 'solmantenimientoidentificacion'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Otros', array('uri' => '#'))->setAttribute('icon','fa fa-th');  
       
        return $menu;
    }
    
    public function AdminMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
        $menu->addChild('Convocatorias', array('route' => 'convocatorias'))->setLinkAttribute('icon','fa fa-th');       
        $menu->addChild('Oficinas', array('route' => 'oficinas_admin'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Servicios', array('route' => 'servicios'))->setAttribute('icon','fa fa-th');
       
        $menu->addChild('Oferta Institucional',array('route'=>'ofertasinstitucionales'));

        
        
        $menu->addChild('Cursos Virtuales', array('route' => 'cursosvirtuales'))->setAttribute('icon','fa fa-th');
      
        $menu->addChild('TramiteICA',array('uri'=>'#'))->setAttribute('class', 'treeview')->setAttribute('icon','fa fa-table')->setLinkAttribute('class','treeview')->setLinkAttribute('data-toggle','dropdown');
        $menu['TramiteICA']->setChildrenAttribute('class', 'treeview-menu');
        $menu['TramiteICA']->addChild('Solicitudes', array('route'=>'solmantenimientoidentificacion'));
        $menu['TramiteICA']->addChild('Estados', array('route'=>'estado'));
        $menu['TramiteICA']->addChild('Seccionales', array('route'=>'seccionales'));
        $menu['TramiteICA']->addChild('Especie Animal', array('route'=>'especieanimal'));
        $menu['TramiteICA']->addChild('Rango Edades', array('route'=>'rangoedades'));
        $menu['TramiteICA']->addChild('Motivo Identificacion', array('route'=>'motivoidentificacion'));
        
        $menu->addChild('Localizacion',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('class','treeview')->setLinkAttribute('icon','fa fa-table');
        $menu['Localizacion']->setChildrenAttribute('class', 'treeview-menu');
        $menu['Localizacion']->addChild('Departamentos', array('route'=>'departamento'));
        $menu['Localizacion']->addChild('Municipios', array('route'=>'municipio'));
        $menu->addChild('Salir', array('route' => 'admin_logout'))->setAttribute('icon','fa fa-th');  
       
        return $menu;
    }
    
    public function superAdminMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Usuarios', array('route' => 'tp_user'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Otros', array('route' => 'usuarios_homepage'))->setAttribute('icon','fa fa-th');  
       
        return $menu;
    }
}