<?php 
 

 namespace Kategorije\Factory;
  
 use Kategorije\Service\KategorijeService;
 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;

 class KategorijeFactory implements FactoryInterface
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
         echo "bok1";
         $realServiceLocator = $serviceLocator->get('katservice');

         return new KategorijeService($realServiceLocator);
     }
 }