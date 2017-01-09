<?php 
return array(
    'module' => array(
        'CategoryAttribute' => array(
            'name' => 'CategoryAttribute',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/category-attribute.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\CategoryAttribute\Controller\ConsoleController' => 'Pacificnm\CategoryAttribute\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\CreateController' => 'Pacificnm\CategoryAttribute\Controller\Factory\CreateControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\DeleteController' => 'Pacificnm\CategoryAttribute\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\IndexController' => 'Pacificnm\CategoryAttribute\Controller\Factory\IndexControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\RestController' => 'Pacificnm\CategoryAttribute\Controller\Factory\RestControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\UpdateController' => 'Pacificnm\CategoryAttribute\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\CategoryAttribute\Controller\ViewController' => 'Pacificnm\CategoryAttribute\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\CategoryAttribute\Service\ServiceInterface' => 'Pacificnm\CategoryAttribute\Service\Factory\ServiceFactory',
            'Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface' => 'Pacificnm\CategoryAttribute\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\CategoryAttribute\Form\Form' => 'Pacificnm\CategoryAttribute\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'category-attribute-create' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/category-attribute/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-delete' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-index' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/category-attribute',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-rest' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/category-attribute[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\RestController'
                    )
                )
            ),
            'category-attribute-update' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-view' => array(
                'pageTitle' => 'Category Attribute',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttribute\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'category-attribute-console-index' => array(
                    'options' => array(
                        'route' => 'category-attribute',
                        'defaults' => array(
                            'controller' => 'Pacificnm\CategoryAttribute\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\CategoryAttribute' => true
        ),
        'template_map' => array(
            'pacificnm/category-attribute/create/index' => __DIR__ . '/../view/category-attribute/create/index.phtml',
            'pacificnm/category-attribute/delete/index' => __DIR__ . '/../view/category-attribute/delete/index.phtml',
            'pacificnm/category-attribute/index/index' => __DIR__ . '/../view/category-attribute/index/index.phtml',
            'pacificnm/category-attribute/update/index' => __DIR__ . '/../view/category-attribute/update/index.phtml',
            'pacificnm/category-attribute/view/index' => __DIR__ . '/../view/category-attribute/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'category-attribute-create',
                'category-attribute-delete',
                'category-attribute-index',
                'category-attribute-update',
                'category-attribute-view'
            )
        )
    ),
    'menu' => array(
        'default' => array()
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Category Attribute',
                        'route' => 'category-attribute-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'category-attribute-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'category-attribute-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'category-attribute-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'category-attribute-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);