<?php

return array(
    'https' => false,
    'NAME_CONTROLLER' => 'Users',    // Default Controller for router
    'NAME_METHOD' => 'index',       // Default Action for router
    'publicWeb' => '',              // Path for public web (web or public_html)
    'assetsPath' => 'assets',
    
    'users/login' => array(
        'users/login', 
        'task=users&action=login'
    ),

    'error/:code' => array(
        'error/[code]/', 
        'task=page&action=error&type=[code]',
        'args' => array(
            'code' => '[code]'
        )
    ),

    'default' => array(
        '[task]/[action]/[params]',
        'task=[task]&action=[action]',
        'params' => '(.*)',
        '_params' => array(
            '[name]/[value]/', 
            '[name]=[value]'
        )
    ),    

);
