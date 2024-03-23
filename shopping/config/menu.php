<?php
    return [
        [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Product Manager',
            'route' => 'product.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'All Product',
                    'route' => 'product.index',
                ],
                [
                    'label' => 'Add Product',
                    'route' => 'product.create',
                ]
            ]
        ],
        [
            'label' => 'Category Manager',
            'route' => 'category.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'All category',
                    'route' => 'category.index',
                ],
                [
                    'label' => 'Add category',
                    'route' => 'category.create',
                ]
            ]
        ],
        [
            'label' => 'User Manager',
            'route' => 'user.index',
            'icon' => 'fa-user',
            'items' => [
                [
                    'label' => 'All User',
                    'route' => 'user.index',
                ]
            ]
        ],
        [
            'label' => 'Order Manager',
            'route' => 'order.index',
            'icon' => 'fa-folder',
            'items' => [
                [
                    'label' => 'All Order',
                    'route' => 'order.index',
                ]
            ]
        ]
    ]
?>