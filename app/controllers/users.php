<?php

include(IN_DIR . "/app/database/db.php");
include(IN_DIR . "/app/helpers/validateUser.php");

$table = 'users';

$admin_users = selectAll($table, ['admin' => 1]);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$confirmPass = '';

// =============== Login Function ==================

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin'] == 1) {
        header('location: ' . BASE_URL . '../admin/dashboard.php');
        //  header('location:  ../../admin/dashboard.php'); // same as above
        //   } elseif($_SESSION['admin'] == 0) {
        //       header('location: ' . BASE_URL . '../index.php');
        //     //   header('location:  ../../index.php'); // same as above

    } else {
        header('location: ' . BASE_URL . '../index.php');
    }
    exit();
}

//=============== Register User Function and Admin ===================

if (isset($_POST['register-btn']) || isset($_POST['create_admin'])) {
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

        unset($_POST['register-btn'], $_POST['confirmPass'], $_POST['create_admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1; 
            $user_id = create($table, $_POST);

            $_SESSION['message'] = "Admin user created successfully";
            $_SESSION['type'] = "success";

            header('location: ' . BASE_URL . '../admin/users/index.php');
            exit();

        } else {

            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);

            // dd($user);
            //log user in
            loginUser($user);
        }
    } else {
        // this holds the names to stay when an error is occured
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
    }
}

//  ======================= Update Section =======================
if (isset($_POST['update_user'])) {
    // dd($_POST);
    $errors = validateUser($_POST);

    // dd(errors);
    if (count($errors) === 0) {
        $id = $_POST['id'];

        // unsetting the Button that is in use and also the hidden id 
        unset($_POST['confirmPass'], $_POST['update_user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0; 
            // calling the update functions
            $count = update($table, $id, $_POST);
 
            $_SESSION['message'] = "Admin user created successfully";
            $_SESSION['type'] = "success";

            header('location: ' . BASE_URL . '../admin/users/index.php');
            exit();

    } else {
        // this holds the names to stay when an error is occured
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
    }
}

// ========================= Edit Section =========================
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    // dd($user); 
     
    $id = $user['id']; 
    $username = $user['username']; 
    $admin = isset($user['admin']) ? 1 : 0;
    $email = $user['email'];
}


// login.php  section
//check is the connection is good
if (isset($_POST['login-btn'])) {
    // dd($_POST);
    $errors = validateLogin($_POST);

    // dd(errors);
    if (count($errors) === 0) {
        $email = selectOne($table, ['email' => $_POST['email']]);

        if ($email && password_verify($_POST['password'], $email['password'])) {
            //log user in
            loginUser($user);
        } else {
            array_push($errors, 'Wrong login recheck! or sign up');
        }
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
}


// =================== Delete Function ======================
if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = "Admin user Deleted successfully";
    $_SESSION['type'] = "success";

    header('location: ' . BASE_URL . '../admin/users/index.php');
    exit();

}