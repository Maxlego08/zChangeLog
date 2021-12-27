<?php

return [
    'title' => 'ZChangeLog',
    'create' => 'Create a changelog',
    'update' => 'Modifying a changelog',
    'icon' => 'Icons',
    'status' => [
        'create' => 'You have just created a changelog.',
        'update' => 'You have just modified a changelog.',
        'destroy' => 'You have just deleted a changelog.',
        'icon' => 'You have just modified the icons.',
    ],

    'fields' => [
        'level' => 'Level'
    ],

    'levels' => [
        'info' => 'Info',
        'success' => 'Success',
        'danger' => 'Danger',
        'warning' => 'Warning',
    ],

    'errors' => [
        'level' => 'Unable to find the type of the changelog.',
        'description' => [
            'empty' => 'The description is mandatory.',
            'length' => 'Your text must be less than 1,000 characters long.',
        ]
    ],

    'permission' => [
        'use' => 'Allows you to modify changelogs',
    ]
];
