<?php


namespace Kategorije\Helper;


use Zend\View\Helper\AbstractHelper;
use Kategorije\Service\KategorijeService;

class KategorijeView extends AbstractHelper  
{
    protected $katService = null;

    public function __construct(KategorijeService $kateService)
    {
    	$this->katService = $kateService;
    }

 

    public function __invoke()
    {
         $jbnekategorije = $this->katService->getAllKat();
        
         
         return $this->getView()->render('/kategorije/kategorije/index',array( 'kategorije' => $jbnekategorije));
        
        
        
      
   
        //return $this->getView()->render('/kategorije/kategorije/index',array( 'kategorije' => $this->getkategorijeTable()->fetchall()));
        //return $this->getView()->render('/kategorije/kategorije/index',array( 'kategorije' => $this->getkategorijeTable()->fetchall()));
       // return "aaaaaaaaaaaaaaaaaaaaaaaaaboksssssssssssssssss";
    }
    
  
}