<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 // Filename: /module/Blog/src/Blog/Service/PostServiceInterface.php
 
 // Filename: /module/Blog/src/Blog/Service/PostService.php
 namespace Kategorije\Service;

 use Zend\View\Model\ViewModel;
 
 
 class KategorijeService 
 {
     
     public function findAllKat()
     {
        
             return new ViewModel(array(
                    'kategorije' => $this->getkategorijeTable()->fetchAll(),
                ));
     }

    protected $_kategorijeTable;
    public function getkategorijeTable() {
        if (!$this->_kategorijeTable) {
            $sm = $this->getServiceLocator();
            $this->_kategorijeTable = $sm->get('Kategorije\Model\KategorijeTable');
        }
        return $this->_kategorijeTable;
    }
}