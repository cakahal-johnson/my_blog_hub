<?php

include(IN_DIR . "/app/database/db.php");
include(IN_DIR . "/app/helpers/validatePost.php");

$table = 'posts';

$topics = selectAll('topics');
$posts = selectAll($table);

$errors = array();

$id =  "";
$title =  "";
$body = "";
$topic_id = "";
$published = "";

//===========Edit function==================

if (isset($_GET['id'])) {
   $post = selectOne($table, ['id' => $_GET['id']]);
   // dd($post);

   $id = $post['id'];
   $title =  $post['title'];
   $body = $post['body'];
   $topic_id = $post['topic_id'];
   $published = $post['published'];
}

// ================= Delete Function ==================
if (isset($_GET['delete_id'])) {
   $count = delete($table, $_GET['delete_id']);
    // for messages
    $_SESSION['message'] = 'Post Deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '../admin/posts/index.php');
    exit();
}


// ===================== Published Function ==================
if (isset($_GET['published']) && isset($_GET['p_id'])) {
   $published = $_GET['published'];
   $p_id = $_GET['p_id'];

   //updating the database
   $count = update($table, $p_id, ['published' => $published]);

     // for messages
     $_SESSION['message'] = 'Post published change successfully';
     $_SESSION['type'] = 'success';
     header('location: ' . BASE_URL . '../admin/posts/index.php');
     exit();
}


// =================== Create function ===================
 
if (isset($_POST['add_post'])) {

   //here we check for the image validation
   // dd($_FILES['image']); 
   // dd($_FILES['image']['name']); // to select only the name

   // here we pass the validate function
   $errors = validatePost($_POST);

   if (!empty($_FILES['image']['name'])) {
      $image_name = time() . '_' . $_FILES['image']['name'];
      $destination = IN_DIR . "../assets/images/image/" . $image_name;

      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      if ($result) {
         $_POST['image'] = $image_name;
      } else {
         array_push($errors, "Failed to upload Image");
      }
   } else {
      array_push($errors, "Post image required");
   }


   if (count($errors) == 0) {
      //removing the topic id from the unset function b'cos it is now created in the database
      //   unset($_POST['add_post'], $_POST['topic_id']);
      unset($_POST['add_post']);
      $_POST['user_id'] = 1;
      // for the table relationship *************************************
      // $_POST['user_id'] = $_SESSION['id'];
      // $_POST['published'] = 1;
      $_POST['published'] = isset($_POST['published']) ? 1 : 0;

      //xss protection for the body
      $_POST['body'] = htmlspecialchars($_POST['body']);

      $post_id = create($table, $_POST);
      // for messages
      $_SESSION['message'] = 'Post created successfully';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . '../admin/posts/index.php');
      exit();

      // header('location:  ../../admin/posts.index.php');
      // dd($_POST);
   } else {
      $title = $_POST['title'];
      $body = $_POST['body'];
      $topic_id = $_POST['topic_id'];
      $published = isset($_POST['published']) ? 1 : 0;
   }
}

// ============= Updating function ================

if (isset($_POST['update_post'])) {
   $errors = validatePost($_POST);

   
   if (!empty($_FILES['image']['name'])) {
      $image_name = time() . '_' . $_FILES['image']['name'];
      $destination = IN_DIR . "../assets/images/image/" . $image_name;

      $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      if ($result) {
         $_POST['image'] = $image_name;
      } else {
         array_push($errors, "Failed to upload Image");
      }
   } else {
      array_push($errors, "Post image required");
   }

   if (count($errors) == 0) {
      $id = $_POST['id'];
    
      // we also usset the id b'cos it wouldnt be updating as well
      unset($_POST['update_post'], $_POST['id']);
       $_POST['user_id'] = 1;
      // for the table relationship *************************************
      // $_POST['user_id'] = $_SESSION['id'];
      // $_POST['published'] = 1;
      $_POST['published'] = isset($_POST['published']) ? 1 : 0;

      //xss protection for the body
      $_POST['body'] = htmlspecialchars($_POST['body']);

      $post_id = update($table, $id, $_POST);
      // for messages
      $_SESSION['message'] = 'Post Updated successfully';
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL . '../admin/posts/index.php');
      exit();

   } else {
      $title = $_POST['title'];
      $body = $_POST['body'];
      $topic_id = $_POST['topic_id'];
      $published = isset($_POST['published']) ? 1 : 0;
   }
}
