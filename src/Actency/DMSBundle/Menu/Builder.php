<?php
// src/Actency/DMSBundle/Menu/Builder.php
namespace Actency\DMSBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
  public function leftNavbarMenu(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');

    $menu->addChild('Sites status', array('route' => 'actency_sites_list'));
    $menu->addChild('Add new site', array('route' => 'actency_add_site'));

    return $menu;
  }

  public function rightNavbarMenu(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');

    $menu->addChild('Settings', array('route' => 'actency_dms_homepage'));
    $menu->addChild('Logout', array(
      'route' => 'actency_sites_list',
    ));

    return $menu;
  }
}