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
                    //$table->setServiceLocator($dbAdapter);
                    return $table;
                },
                'kategorijeservis'=>'Kategorije\Service\KategorijeService',
                 'kategorijeservis' => function($sm) {
                    $table = new Kategorije\Service\KategorijeService();
                    
                    return $table;
                },       
                  'kategorijeviewservis' => function($sm) {
                    $table = new Kategorije\View\Factory\KategorijeViewFactory();
                    
                    return $table;
                },       
                 
            ),
        );
    }
    public function getViewHelperConfig()
    {
        echo "aaa";
	return array(
		'factories' => array(
			/*'KategorijeView' => function ($serviceManager) {
				// Get the kat Service
                                echo "bbbbaa";
				$kateService = $serviceManager->getServiceLocator()->get('kategorijeservis');
				return new \Kategorije\Helper\KategorijeView($kateService);
			},*/
                                'KategorijeView' => function ($serviceManager) {
				// Get the kat Service
                                echo "bbbbaa";
				$kateService = $serviceManager->getServiceLocator()->get('kategorijeviewservis');
				return new \Kategorije\View\Helper\KategorijeView($kateService);
			},
                    
		),
	);
    }
}