<?php

function validateTopic($topic){
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Name is required');
    }

   

    // email unique
    // $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    // if ($existingTopic) {
    //     array_push($errors, 'Name already exists');
    // }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);  
    if ($existingTopic) {
        // for updating 
        if (isset($topic['update_topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Same Post title already exists');  
        }
        // for Posting  
        if (isset($topic['add_topic'])) {
            array_push($errors, 'Name already exists');  
        }
    }
    return $errors;

}

