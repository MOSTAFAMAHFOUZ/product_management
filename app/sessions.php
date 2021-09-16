<?php 



// get session if exists
function getSession($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
    return null;
}


// add new session
function setSession($key,$value){
    $_SESSION[$key] = $value;
}

// remve session if exists
function removeSession($key){
    if(isset($_SESSION[$key])){
        unset($_SESSION[$key]);
    }
}

function destroySession(){
    if(session_status() == PHP_SESSION_ACTIVE){
        unset($_SESSION);
        session_destroy();
    }
}


function old($key){
    $val = '';
    if(isset($_SESSION[$key])){
        $val  = $_SESSION[$key];
        removeSession($key);
    }

    echo $val;
}


function successSession(){
    $val = '';
    if(isset($_SESSION['success'])){
        $val  = $_SESSION['success'];
        removeSession('success');
    }

    return $val;
}


function getErrors(){
    $val = [];
    if(isset($_SESSION['errors'])){
        $val  = $_SESSION['errors'];
        removeSession('errors');
    }

    return $val;
}