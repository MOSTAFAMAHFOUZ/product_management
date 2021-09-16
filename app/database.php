<?php 



function db_real_escape($value){
    global $conn;
    return mysqli_real_escape_string($conn,$value);
}
function db_get_all($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return [];
    }
}

// var_dump($conn);
function db_insert($query){
    global $conn;
    mysqli_query($conn,$query);
    if(db_affected_rows()){
        return true;
    }
}


function db_update($query){
    global $conn;
    mysqli_query($conn,$query);
    if(db_affected_rows()){
        return true;
    }
}

function db_delete($query){
    global $conn;
    mysqli_query($conn,$query);
    if(db_affected_rows()){
        return true;
    }
}


function db_get_row($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
}




// check if query success or not 
function db_affected_rows(){
    global $conn;
    if(mysqli_affected_rows($conn) >= 0){
        return true;
    }else{
        die("database error : ". mysqli_error($conn));
    }
}

// $query = "SELECT * FROM categories";
// var_dump(db_get_all($query));
// db_insert("asdfasdfsadf");



?>