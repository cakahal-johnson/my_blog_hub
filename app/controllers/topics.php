<?php

// include("path.php");
include(IN_DIR . "/app/database/db.php");
include(IN_DIR . "/app/helpers/validateTopic.php");

$table = "topics";

$errors = array();
$id = '';
$name = '';
$description = '';

$topics = selectAll($table);
// dd($topics);

if (isset($_POST['add_topic'])) {
$errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['add_topic']);
    // dd($_POST);
        $topic_id = create('topics', $_POST);
        $_SESSION['message'] = 'Topic created successfully';
        $_SESSION['type'] = 'success';

    header('location: ' . BASE_URL . '../admin/topics/index.php');
    exit();

    }else{
        $name = $_POST['name'];
         $description = $_POST['description'];
    }

    }


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description']; 
}

//delete function
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic Updated successfully';
    $_SESSION['type'] = 'success';

    header('location: ' . BASE_URL . '../admin/topics/index.php');
    exit();
    
}



// update function
if (isset($_POST['update_topic'])) { 

    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update_topic'], $_POST['id']);
        // dd($_POST);
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Topic Updated successfully';
        $_SESSION['type'] = 'success';

        header('location: ' . BASE_URL . '../admin/topics/index.php');
        exit();
    }else{

        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }

   
}