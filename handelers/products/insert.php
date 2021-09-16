<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");


if(isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sinitizing inputs 
    $name = val_sanitize($_POST['name']);
    $price = val_sanitize($_POST['price']);
    $qty = val_sanitize($_POST['qty']);
    $category_id = filter_var($_POST['category_id'],FILTER_SANITIZE_NUMBER_INT);
    

    // validations 
    // name
    if(!val_required($name)){
        $errors[] = "name is required";
    }elseif(!val_string($name)){
        $errors[] = "name must be a string";
    }
    elseif(!val_min($name,3)){
        $errors[] = "name must be grater than 3 chars";
    }
    elseif(!val_max($name,30)){
        $errors[] = "name must be smaller than 30 chars";
    }

    // price 
    if(!val_required($price)){
        $errors[] = "price is required";
    }elseif(!val_numeric($price)){
        $errors[] = "price must be a number";
    }

    // qty
    if(!val_required($qty)){
        $errors[] = "quantity is required";
    }elseif(!val_numeric($qty)){
        $errors[] = "quantity must be a number";
    }




    if(empty($errors)){
        $sql = "INSERT INTO products(`name`,`price`,`qty`,`category_id`) VALUES('$name','$price','$qty','$category_id')";
        if(db_insert($sql)){
            setSession("success","added success");
            redirect("products/index");
        }
    }else{
        // set old values in session 
        setSession('name',$name);
        setSession('price',$price);
        setSession('qty',$qty);
        // define errors
        setSession('errors',$errors);
        redirect("products/add");
    }


}

