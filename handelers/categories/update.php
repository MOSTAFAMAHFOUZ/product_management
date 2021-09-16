<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");

// check if id was sent throgh url ( get method )
if(isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sanitize the id 
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $name = val_sanitize($_POST['name']);

    // validations 
    if(!val_required($name)){
        $errors[] = "this field required";
    }elseif(!val_string($name)){
        $errors[] = "this field must be a string";
    }
    elseif(!val_min($name,3)){
        $errors[] = "this field must be grater than 3 chars";
    }
    elseif(!val_max($name,30)){
        $errors[] = "this field must be smaller than 30 chars";
    }

    // check from validation 
    if(empty($errors)){
        // check if this id is exists in db 
        if(db_get_row("SELECT * FROM `categories` WHERE `id`='$id' ")){
            // delete this row 
            $query = "UPDATE `categories` SET `name`='$name' WHERE `id`='$id' ";
            // die($query);
            if(db_update($query)){
                setSession('success',"updated successsfully");
            }else{
                setSession('errors',['Error in updating operation']);
            }
        }else{
            setSession('errors',['this id is not exist']);
        }

    }else{
        setSession('errors',$errors);
        redirect("categories/edit.php?id=".$id);
    }
}
redirect("categories/index");
