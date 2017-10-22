<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$config = array(
 'login' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'user_login' => array(
        array(
            'field' => 'user_email_id',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'user_pass',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'signup' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'user_password',
              'label' => 'Password',
            'rules' => 'required'
        )
		,
        array(
            'field' => 'user_name',
              'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'user_contact_no',
              'label' => 'Mobile',
            'rules' => 'required|number'
        )
    ),
    'forgot_pass' => array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    )
        )
?>