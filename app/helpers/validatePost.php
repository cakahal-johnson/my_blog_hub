<?php

function validatePost($post){
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Title is required');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Body is required');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Select a topic');
    }


    //  unique post
    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        // for updating 
        if (isset($post['update_post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Same Post title already exists');  
        }
        // for Posting  
        if (isset($post['add_post'])) {
            array_push($errors, 'Same Post title already exists');  
        }
    }

    return $errors;

}
