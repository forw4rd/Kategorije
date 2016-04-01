<?php 
 

 namespace Kategorije\View\Factory;
  
 use Kategorije\View\Helper\KategorijeView;
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
         $realServiceLocator = $serviceLocator->getServiceLocator();
         $postService        = $realServiceLocator->get('Kategorije\Service\KategorijeService');

         return new KategorijeView($postService);
     }
 }