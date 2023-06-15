<?php

session_start();
require('connect.php');


// funtion for eching results
function dd($value)
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

// functions for Executing Sql querys
function executeQuery($sql, $data){

    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values)); 
    $stmt->bind_param($types, ...$values);
    // $stmt->bind_param($types, $username, $admin, $email, $password);

    // this will return the database data once the conditions is meant

    $stmt->execute();
    
    return $stmt;
}

// function for selecting ALL
function selectAll($table, $conditions = []){
    global $conn;
    $sql = "SELECT * FROM $table";

    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    } else {
        /**
         * returns records that match conditions ....
         * $sql = "SELECT * FROM $table WHERE uername='cakahal' AND admin=1;
         * 
         */
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    
}



// function for selecting One
function selectOne($table, $conditions) // optional params* 
{
    global $conn;
        $sql = "SELECT * FROM $table";

        $i = 0;
        foreach($conditions as $key => $value){
            if($i === 0){
                // $sql = $sql . " WHERE $key = $value";
                $sql = $sql . " WHERE $key=?";
            }else{
                // $sql = $sql . " AND $key = $value";
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";

        // dd($sql);
        //using perpared statement
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_assoc();
        return $records ;
    
    
}



// function for create
function create($table, $data){

    global $conn;
    $sql = "INSERT INTO $table SET "; // remember to put the end white-space

    /*
    ways for creating sql
    $sql = "INSERT INTO users (username, admin, email, password) VALUES (?, ?, ?, ?)"
    $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=? // we use this section
       
    */
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            // for the first and the last key , is not needed but others needs , first 
            // username=?,
            $sql = $sql . " $key=?";
        }else{
            //admin=?,
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    // dd($sql); // use for displaying the database
    $stmt = executeQuery($sql, $data);
    // $stmt = $conn->prepare("INSERT INTO $table (username, admin, email, password) VALUES (?,?,?,?)");
    // $stmt->bind_param("siss", $username, $admin, $email, $password);
    // $stmt->execute();



    // echo "New records created successfully";
    // $stmt->close();
    // $conn->close();

    $id = $stmt->insert_id;
    return $id;





}
// function for updating records
function update($table, $id, $data){
// $sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=? // we use this section

    global $conn;
    $sql = "UPDATE $table SET "; // remember to put the end white-space



    $i = 0;

    
    foreach($data as $key => $value){
        if($i === 0){
            // for the first and the last key , is not needed but others needs , first 
            // username=?,
            $sql = $sql . " $key=?";
        }else{
            //admin=?,
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    // we combine with the existing sql
    $sql = $sql . " WHERE id=?"; 
    $data['id'] = $id;

    $stmt = executeQuery($sql, $data);


    return $stmt->affected_rows; // affected_row returns -1 if not successful but 1 if successful


    // dd($sql); // use for displaying the database

}

// delete function
function delete($table, $id){
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

/**================================================== */

// $conditions = [
//     'admin' => 0,
//     'username' => 'Cakahal'
// ];

// $data = [
//     'username' => 'Cakahal johnson',
//     'admin' => 0,
//     'email' => 'example@gmail.com',
//     'password' => '123456'
// ];



// $users = selectAll('users');
// $users = selectAll('users', $conditions);
// dd($users);

// $users = selectOne('users', $conditions);
// dd($users);
// // 
// $id = create('users', $data);
// dd($id);

// $id = update('users', 2, $data);
// dd($id);


// $id = delete('users', 2);
// dd($id);
