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
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $row = db_get_row("SELECT * FROM `products` WHERE `id`='$id' ");

    

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



    // check from errors
    if(empty($errors)){
        if($row){
            $sql = "UPDATE products SET `name`='$name',`price`='$price',`qty`='$qty',`category_id`='$category_id' WHERE `id`='$id'";
            if(db_update($sql)){
                setSession("success","updated success");
                redirect("products/index");
            }
        }else{
            setSession("errors",['this item is not exist']);
        }
        
    }else{

         // set old values in session 
         setSession('name',$name);
         setSession('price',$price);
         setSession('qty',$qty);
         // define errors
        // define errors
        setSession('errors',$errors);
        redirect("products/edit.php?id=".$id);
    }


}

