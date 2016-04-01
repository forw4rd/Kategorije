<?php
/*



return array(
    'controllers' => array(
        'invokables' => array(
            'Artikli\Controller\Artikli' => 'Artikli\Controller\ArtikliController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'artikli' => __DIR__ . '/../view',
        ),
    ),
    
    
     array(
         'invokables' => array(
             'Artikli\Controller\Artikli' => 'Artikli\Controller\ArtikliController',     
             ),
    ),
    // add this section
    'router' => array(
        'routes' => array(
            'artikli' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/artikli',
                        'defaults' => array(
                        'controller' => 'Artikli\Controller\Artikli',
                        'action' => 'index',
                        
                         ),
                ),
        'may_terminate' => true,
        'child_routes'=>array(
        'view' => array(
            'type'=>'Segment',
            'options'=>array(
               'route'=>'/:action/:id[/:trash]',
               'constraints' => array(
                      //   'action' => 'prikazi',
                         'action' => '[a-z0-9_-]+',
                       //  'action' => 'filtriraj',
                        'id' => '[0-9]+',
                        ),
                'defaults'=>array(
                    
                ),
                ),
            'may_terminate' => true, 
            ), 
        /*  
        'filter' => array(
            'type'=>'Segment',
            'options'=>array(
               'route'=>'/:action/:id[/:trash]',
               'constraints' => array(
                      //  'action' => 'prikazi',
                       //    'action' => '[a-z0-9_-]+',
                        'action' => 'filtriraj',
                        'id' => '[0-9]+',
                        ),
                'defaults'=>array(
                    
                ),
                ),
                 'may_terminate' => true,
            ), 
            
            ),
            ), 
        ),
    ),

);



*/



return [
  'controllers' => [
        'invokables' => [
            'Kategorije\Controller\Kategorije' => 'Kategorije\Controller\KategorijeController',
        ],
    ],
   
    'view_manager' => [
        'template_path_stack' => [
            'kategorije' => __DIR__ . '/../view',
        ],
    ],
    'view_helpers'=>array(
        'factories'=>array(
           '\Kategorije\View\Helper\KategorijeView'=> '\Kategorije\View\Factory\KategorijeViewFactory',
          
        ),
    ),
    
    'service_manager' => array(
        'factories' => array(
             'kategorijeservice'=> 'Kategorije\Factory\KategorijeFactory',
             
             'KategorijeViewFactory'=> '\Kategorije\View\Factory\KategorijeViewFactory',
            //'Kategorije\Service\KategorijeService' => ,
             
        ),
        'invokables'=>array(
            'katservice'=> 'Kategorije\Service\KategorijeService',
        ),
     ),
    
    // add this section
    'router' => [
        'routes' => [
            'kategorije' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/kategorije',
                    'defaults' => [
                        'controller' => 'Kategorije\Controller\Kategorije',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
            ],
        ],
    ],

];