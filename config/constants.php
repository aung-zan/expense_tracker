<?php

return [
    'default_expense_categories' => [
        'Groceries',
        'Transportation',
        'Utilities',
    ],
    'sidemenu' => [
        [
            'name' => 'Dashboard',
            'icon' => 'zmdi zmdi-chart',
            'route_name' => 'dashboard'
        ],
        [
            'name' => 'Income',
            'icon' => 'zmdi zmdi-money',
            'route_name' => 'incomeList',
            'child_routes' => [
                'incomeList', 'incomeCreate', 'incomeEdit'
            ]
        ],
        [
            'name' => 'Expense',
            'icon' => 'zmdi zmdi-money-off',
            'route_name' => 'expenseList',
            'child_routes' => [
                'expenseList', 'expenseCreate', 'expenseEdit'
            ]
        ],
        [
            'name' => 'Expense Category',
            'icon' => 'zmdi zmdi-tag',
            'route_name' => 'expenseCategoryList',
            'child_routes' => [
                'expenseCategoryList', 'expenseCategoryCreate', 'expenseCategoryEdit'
            ]
        ],
    ],
];
