<?php

namespace Admin\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    
    
     public function frontenedMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-collapse pull-right');
       
        //$menu->setLabelAttribute('class', 'span');
        $menu->addChild('Inicio', array('route' => 'web_homepage'))->setLabel('Inicio')->setAttribute('icon','icon-user');                     
        $menu->addChild('Convocatorias', array('route' => 'convocatorias_homepage'))->setAttribute('icon','icon-trophy');
        $menu->addChild('Servicios', array('route' => 'servicios_homepage'))->setLabel('Servicios')->setAttribute('icon','icon-picture');              
        $menu->addChild('Ofertas', array('route' => 'oferta_homepage'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Oficinas', array('route' => 'oficinas_homepage'))->setLabel('Oficinas')->setAttribute('icon','icon-doc-text');              
        $menu->addChild('Admin', array('route' => 'admin_homepage'))->setLabel('Administrador')->setAttribute('icon','fa fa-dashboard');   
        $menu->addChild('Super Admin', array('route' => 'tp_user'))->setLabel('Super Admin')->setAttribute('icon','fa fa-dashboard');   
        
       /* $menu->addChild('Tipo Usuario', array('route' => 'tipousuario'))->setAttribute('icon','icon-bar-chart');
        $menu->addChild('Tipo Identificación', array('route' => 'tipoidentificacion'))->setAttribute('icon','icon-list-alt');
       
        
        $menu->addChild('Colegio',array('uri'=>'#'))->setAttribute('class','dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['Colegio']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Colegio']->addChild('Crear', array('route'=>'colegio'));
        $menu['Colegio']->addChild('Tipo Colegio', array('route'=>'tipocolegio'));
        $menu['Colegio']->addChild('Niveles', array('route'=>'nivel'));

        $menu->addChild('SocioEconómico',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['SocioEconómico']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['SocioEconómico']->addChild('Estrato', array('route'=>'estrato'));
        $menu['SocioEconómico']->addChild('Departamento', array('route'=>'departamento'));
        $menu['SocioEconómico']->addChild('Localidad', array('route'=>'localidad'));
        $menu['SocioEconómico']->addChild('Municipio', array('route'=>'municipio'));
        $menu->addChild('Tipo calificación', array('route' => 'tipocalificacion'))->setAttribute('icon','icon-bar-chart');*/

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
        $menu->addChild('Convocatorias', array('route' => 'convocatorias'))->setAttribute('icon','fa fa-th');  
       /* $menu->addChild('Tipo Usuario', array('route' => 'tipousuario'))->setAttribute('icon','icon-bar-chart');
        $menu->addChild('Tipo Identificación', array('route' => 'tipoidentificacion'))->setAttribute('icon','icon-list-alt');
       
        
        $menu->addChild('Colegio',array('uri'=>'#'))->setAttribute('class','dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['Colegio']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Colegio']->addChild('Crear', array('route'=>'colegio'));
        $menu['Colegio']->addChild('Tipo Colegio', array('route'=>'tipocolegio'));
        $menu['Colegio']->addChild('Niveles', array('route'=>'nivel'));

        $menu->addChild('SocioEconómico',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['SocioEconómico']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['SocioEconómico']->addChild('Estrato', array('route'=>'estrato'));
        $menu['SocioEconómico']->addChild('Departamento', array('route'=>'departamento'));
        $menu['SocioEconómico']->addChild('Localidad', array('route'=>'localidad'));
        $menu['SocioEconómico']->addChild('Municipio', array('route'=>'municipio'));
        $menu->addChild('Tipo calificación', array('route' => 'tipocalificacion'))->setAttribute('icon','icon-bar-chart');*/

        return $menu;
    }

    
     public function solicitudesMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');              
        $menu->addChild('Solicitudes', array('route' => 'oficinas_admin'))->setAttribute('icon','fa fa-th');
        
       /* $menu->addChild('Tipo Usuario', array('route' => 'tipousuario'))->setAttribute('icon','icon-bar-chart');
        $menu->addChild('Tipo Identificación', array('route' => 'tipoidentificacion'))->setAttribute('icon','icon-list-alt');
       
        
        $menu->addChild('Colegio',array('uri'=>'#'))->setAttribute('class','dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['Colegio']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Colegio']->addChild('Crear', array('route'=>'colegio'));
        $menu['Colegio']->addChild('Tipo Colegio', array('route'=>'tipocolegio'));
        $menu['Colegio']->addChild('Niveles', array('route'=>'nivel'));

        $menu->addChild('SocioEconómico',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','icon-folder-open')->setLinkAttribute('class','dropdown-toggle')->setLinkAttribute('data-toggle','dropdown');
        $menu['SocioEconómico']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['SocioEconómico']->addChild('Estrato', array('route'=>'estrato'));
        $menu['SocioEconómico']->addChild('Departamento', array('route'=>'departamento'));
        $menu['SocioEconómico']->addChild('Localidad', array('route'=>'localidad'));
        $menu['SocioEconómico']->addChild('Municipio', array('route'=>'municipio'));
        $menu->addChild('Tipo calificación', array('route' => 'tipocalificacion'))->setAttribute('icon','icon-bar-chart');*/

        return $menu;
    }
    
    public function serviciosMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Servicios', array('route' => 'oficinas_admin'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Otros', array('route' => 'convocatorias'))->setAttribute('icon','fa fa-th');  
       
        return $menu;
    }
   
    public function convocatoriasMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
       
        //$menu->setLabelAttribute('class', 'span');

        $menu->addChild('Panel', array('route' => 'admin_homepage'))->setLabel('Panel')
        ->setAttribute('icon','fa fa-dashboard');
            
               
        $menu->addChild('Convocatorias', array('route' => 'convocatorias'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Otros', array('uri' => '#'))->setAttribute('icon','fa fa-th');  
       
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
            
        $menu->addChild('Convocatorias', array('route' => 'convocatorias'))->setAttribute('icon','fa fa-th');       
        $menu->addChild('Oficinas', array('route' => 'oficinas_admin'))->setAttribute('icon','fa fa-th');
        $menu->addChild('Servicios', array('route' => 'servicios'))->setAttribute('icon','fa fa-th');
       
        $menu->addChild('Oferta Institucional',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','fa fa-table')->setLinkAttribute('class','treeview')->setLinkAttribute('data-toggle','dropdown');
        $menu['Oferta Institucional']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Oferta Institucional']->addChild('Oferta', array('route'=>'ofertasinstitucionales'));
        $menu['Oferta Institucional']->addChild('Pasos Oferta', array('route'=>'pasosoferta'));
        
        
        $menu->addChild('Cursos Virtuales', array('route' => 'cursosvirtuales'))->setAttribute('icon','fa fa-th');
        $menu->addChild('TramiteICA',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','fa fa-table')->setLinkAttribute('class','treeview')->setLinkAttribute('data-toggle','dropdown');
        $menu['TramiteICA']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['TramiteICA']->addChild('Solicitudes', array('route'=>'solmantenimientoidentificacion'));
        $menu['TramiteICA']->addChild('Seccionales', array('route'=>'seccionales'));
        $menu['TramiteICA']->addChild('Especie Animal', array('route'=>'especieanimal'));
        $menu['TramiteICA']->addChild('Rango Edades', array('route'=>'rangoedades'));
        
        $menu->addChild('Localizacion',array('uri'=>'#'))->setAttribute('class', 'dropdown')->setAttribute('icon','fa fa-table')->setLinkAttribute('class','treeview')->setLinkAttribute('data-toggle','dropdown');
        $menu['Localizacion']->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Localizacion']->addChild('Departamentos', array('route'=>'departamento'));
        $menu['Localizacion']->addChild('Municipios', array('route'=>'municipio'));
        $menu->addChild('Otros', array('uri' => '#'))->setAttribute('icon','fa fa-th');  
       
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