<?php

return [
    'title' => 'ZChangeLog',
    'create' => 'Créer un changelog',
    'update' => 'Modifier un changelog',
    'icon' => 'Icônes',
    'status' => [
        'create' => 'Vous venez de créer un changelog.',
        'update' => 'Vous venez de modifier un changelog.',
        'destroy' => 'Vous venez de supprimer un changelog.',
        'icon' => 'Vous venez de modifier les icônes.',
    ],

    'fields' => [
        'level' => 'Level'
    ],

    'levels' => [
        'info' => 'Info',
        'success' => 'Succès',
        'danger' => 'Danger',
        'warning' => 'Avertissement',
    ],

    'errors' => [
        'level' => 'Impossible de trouver le type du changelog.',
        'description' => [
            'empty' => 'La description est obligatoire.',
            'length' => 'Votre texte doit avoir moins de 1.000 caractères.',
        ]
    ],

    'permission' => [
        'use' => 'Permet de modifier les changelogs',
    ]
];
