<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kategorije\Model\Entity;



class Kategorije {

    protected $_id;
    protected $_idD;
    
    protected $_ime;
    protected $_imeD;
   
    
    public function __construct(array $options = null) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value) {
        $method = 'set' . $name;
        if (!method_exists($this, $method)) {
           echo 'Invalid Method';
         
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = 'get' . $name;
        if (!method_exists($this, $method)) {
            throw new Exception('Invalid Method');
        }
        return $this->$method();
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function getRootId() {
        return $this->_id;
    }

    public function setRootId($id) {
        $this->_id = $id;
        return $this;
    }
    
     public function getDown1Id() {
        return $this->_idD;
    }

    public function setDown1Id($id) {
        $this->_idD = $id;
        return $this;
    }


    public function getRootIme() {
        return $this->_ime;
    }
  public function setRootIme($ime) {
        $this->_ime = $ime;
        return $this;
    }
      public function getDown1Ime() {
        return $this->_imeD;
    }
  public function setDown1Ime($ime) {
        $this->_imeD = $ime;
        return $this;
    }
    
   
  

    
    
    public function getId_kategorije() {
        return $this->_id_kategorije;
    }

    public function setId_kategorije($kategorija) {
        $this->_id_kategorije = $kategorija;
        return $this;
    }

} 