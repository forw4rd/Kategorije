<?php 
 

 namespace Kategorije\View\Factory;
  

 use Kategorije\Service\KategorijeService;
 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;

 class KategorijeViewFactory implements FactoryInterface
 {
     /**
      * Create service
      *
      * @param ServiceLocatorInterface $serviceLocator
      *
      * @return mixed
      */
     public function createService(ServiceLocatorInterface $serviceLocator)
     {
         echo "bokic";
         $realServiceLocator = $serviceLocator->get('kategorijeservice');

         return new KategorijeService($realServiceLocator);
     }
 }