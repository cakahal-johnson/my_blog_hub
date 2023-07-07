<?php

function validateUser($user){
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'password is required');
    }

    if ($user['confirmPass'] !== $user['password']) {
        array_push($errors, 'password is not matched');
    }

    // email unique
    // $existingUser = selectOne('Users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        // for updating 
        if (isset($user['update_user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Same Post title already exists');  
        }
        // for Posting  
        if (isset($user['create_admin'])) {
            array_push($errors, 'Email already exists');  
        }
    }  

    return $errors;

}

// login section
function validateLogin($user){
    $errors = array();


    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'password is required');
    }

  

    return $errors;

}