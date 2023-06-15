<?php

include("path.php");
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$errors = array();
$username = '';
$email = '';
$password = '';
$confirmPass = '';
$tableName = 'users';

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

  if ($_SESSION['admin']) {
    //   header('Location: ' . BASE_URL . 'admin/dashboard.php');
      header('location:  ../../admin/dashboard.php'); // same as above
  } else {
    //   header('Location: ' . BASE_URL . 'index.php');
      header('location:  ../../index.php'); // same as above

  }
  exit(); 

}

if (isset($_POST['register-btn'])) {
    // # code...
    // var_dump($_POST);
    // die();

    // $errors = array();

    // if (empty($_POST['username'])) {
    //     array_push($errors, 'Username is required');
    // }

    // if (empty($_POST['email'])) {
    //     array_push($errors, 'Email is required');
    // }

    // if (empty($_POST['password'])) {
    //     array_push($errors, 'password is required');
    // }
    // // if (empty($_POST['confirmPass'])){
    // //     array_push($errors, 'password is required');
    // // }

    // if ($_POST['confirmPass'] !== $_POST['password']) {
    //     array_push($errors, 'password is not matched');
    // }

    // above commented is moved to FormValidate.php
    $errors = validateUser($_POST);

    // dd(errors);
    if (count($errors) === 0) {

        unset($_POST['register-btn'], $_POST['confirmPass']);

        $_POST['admin'] = 0;

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create($tableName, $_POST);
        $user = selectOne($tableName, ['id' => $user_id]);

        // dd($user);
        //log user in
       loginUser($user);

    } else {
// this holds the names to stay when an error is occured
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
    }
}


// login.php  section
//check is the connection is good
if (isset($_POST['login-btn'])) {
    // dd($_POST);
    $errors = validateLogin($_POST);

    // dd(errors);
    if (count($errors) === 0) {
        $email = selectOne($tableName, ['email' => $_POST['email']]);

        if ($email && password_verify($_POST['password'], $email['password'])) {
              //log user in
          $_SESSION['id'] = $user['id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['admin'] = $user['admin'];
          $_SESSION['message'] = 'You are now logged in';
          $_SESSION['type'] = 'success';

        if ($_SESSION['admin']) {
            // header('Location: ' . BASE_URL . 'admin/dashboard.php');
            header('location:  ../../admin/dashboard.php'); // same as above
        } else {
            // header('Location: ' . BASE_URL . '/index.php');
            header('location:  ../../index.php'); // same as above

        }
        exit(); 
        } else {
            array_push($errors, 'Wrong login recheck! or sign up');
        }
        
        
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

}