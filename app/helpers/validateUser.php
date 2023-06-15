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
    $existingUser = selectOne('Users', ['email' => $user['email']]);
    if (isset($existingUser)) {
        array_push($errors, 'Email already exists');
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