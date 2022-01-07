<?php

const CONTROLLERS = array(
  
    [
      'method'  => 'GET',
      'url'     => '/client',
      'name'    => 'users',
      'use'     => 'UserController',
      'action'  => 'index'
    ],

    [
      'method'  => 'GET',
      'url'     => '/users/{user_id}/edit',
      'name'    => 'users.edit',
      'use'     => 'UserController',
      'action'  => 'edit'
    ],
    [
      'method'  => 'GET',
      'url'     => '/admin',
      'name'    => 'sdf',
      'use'     => 'HomeController',
      'action'  => 'index'
    ],
    [
      'method'  => 'GET',
      'url'     => '/signin',
      'name'    => 'sdf',
      'use'     => 'HomeController',
      'action'  => 'signin'
    ],
    [
      'method'  => 'GET',
      'url'     => '',
      'name'    => 'sdfads',
      'use'     => 'UserController',
      'action'  => 'index'
    ],    
    [
      'method'  => 'GET',
      'url'     => '/register',
      'name'    => 'register',
      'use'     => 'HomeController',
      'action'  => 'signup'
    ],
    [
      'method'  => 'POST',
      'url'     => '/',
      'name'    => 'signup',
      'use'     => 'SignupController',
      'action'  => 'register'
    ]

); 
