<?php

return [
    // List Of Roles
    'role' => [
        'user_group' => [
            'regular_user'
        ],
        'expert_group' => [
            'technical_expert',
            'technical_support',
            'customer_support',
            'sales_expert'
        ],
        'manager_group' => [
            'resource_manager',
            'project_manager',
            'account_manager',
            'team_manager',
            'communications_manager',
            'marketing_manager'
        ],
        'super_admin_group' => [
            'system_administrator'
        ],
        'analyst_group' => [
            'data_analyst'
        ],
        'developer_group' => [
            'programmer'
        ],
        'inspector_group' => [
            'inspector'
        ]
    ],
    // List Of Permissions
    'permission' => [
        'role' => [
            'index',
            'store',
            'update',
            'delete'
        ],
        'permission' => [
            'index'
        ]
    ],
    // Sync Permissions To Role
    'role_permission' => [
        'system_administrator' => ['*'],
        'programmer'           => ['*'],
        'team_manager'         => ['user']
    ]
];
