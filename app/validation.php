<?php 


// sanitize inputs 
function val_sanitize($value){
    return db_real_escape(trim(htmlspecialchars(htmlentities($value))));
}



// required 
function val_required($value){
    if(!empty($value)){
        return true;
    }
    return false;
}

// numeric val 
function val_email($value){
    if(filter_var($value,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}



// email validation 
function val_min($value,$min){
    if(strlen($value) > $min){
        return true;
    }
    return false;
}


// minimum value validation
function val_max($value,$max){
    if(strlen($value) < $max){
        return true;
    }
    return false;
}


// string value validation 
function val_string($value){
    if(preg_match("/[a-zA-Z ,1-9]+$/",$value)){
        return true;
    }
    return false;
}


// integer value validation
function val_integer($value){
    if(is_int($value)){
        return true;
    }
    return false;
}


// float value validation
function val_float($value){
    if(is_float($value)){
        return true;
    }
    return false;
}


// numeric value validation
function val_numeric($value){
    if(is_numeric($value)){
        return true;
    }
    return false;
}



// file check if file 
function val_file($value){
    if(isset($_FILES[$value])){
        return true;
    }
    return false;
}


