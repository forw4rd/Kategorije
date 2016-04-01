<?php



namespace Kategorije\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class KategorijeController extends AbstractActionController {
    public function indexAction() {
       
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