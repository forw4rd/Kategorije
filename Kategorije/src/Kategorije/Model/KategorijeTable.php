<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kategorije\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;


class KategorijeTable extends AbstractTableGateway {

    protected $table = 'kategorije';
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }
    
    
     
    public function fetchAll() {
                   //select root.Ime as root_ime , down1.Ime as down1_ime from kategorije as root left outer join Kategorije as down1 on down1.id_kategorije = root.id where root.id_kategorije = 0 order by root_ime , down1_ime
                  //select root.Ime as root_ime, root.id as root_id , down1.Ime as down1_ime ,down1.id as down1_id from kategorije as root left outer join Kategorije as down1 on down1.id_kategorije = root.id where root.id_kategorije = 0 order by root_id , down1_id
        
        $sql = "select root.Ime as root_ime , down1.Ime as down1_ime, root.id as root_id, down1.id as down1_id   from kategorije as root left outer join Kategorije as down1 on down1.id_kategorije = root.id where root.id_kategorije = 0  order by root_id  "; 

        $statement = $this->adapter->query($sql); 
        $resultSet  = $statement->execute(); 
      // $this->tableGateway->getAdapter()->driver->getConnection()->execute("select root.Ime as root_ime , down1.Ime as down1_ime from kategorije as root left outer join Kategorije as down1 on down1.id_kategorije = root.id where root.id_kategorije = 0 order by root_ime , down1_ime ");
     
    
      
        $entities = array();
        foreach ($resultSet as $row) {
         //   var_dump($row);
            $entity = new Entity\Kategorije();
            $entity->setRootIme($row["root_ime"])
                   ->setDown1Ime($row["down1_ime"])
                   ->setRootId($row["root_id"])
                   ->setDown1Id($row["down1_id"]);
            $entities[] = $entity;
        }
        return $entities;
    }
    
   
    
    
     public function getKategorije($id) {
        $row = $this->select(array('id' => (int) $id))->current();
        if (!$row)
            return false;

        $kategorija = new Entity\Kategorije(array(
                    'id' => $row->id,
                    'Ime' => $row->Ime,
                    'id_kategorije'=>$row->id_kategorije,
                    
                ));
        return $kategorija;
    }
  
    
    
}