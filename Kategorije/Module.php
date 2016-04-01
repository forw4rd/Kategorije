<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kategorije;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
        
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Kategorije\Model\KategorijeTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new Model\KategorijeTable($dbAdapter);
                    
                    return $table;
                },
                
                 /*
                  'Kategorije\Service\KategorijeService' => function()  {
                  $ah= new Service\KategorijeService();
                  return $ah;
                },      
                 */
            ),
        );
    }
    public function getViewHelperConfig()
    {
       
	return array(
		'factories' => array(
		  'KategorijeView' => function ($serviceManager) {
				
                                echo "bbbbaa";
				$kateService = $serviceManager->getServiceLocator()->get('KategorijeViewFactory');
                              //  $kateService = $serviceManager->getServiceLocator()->get('kategorijeservice');
				return new \Kategorije\View\Helper\KategorijeView($kateService);
			},
                    
		),
	);
    }
}