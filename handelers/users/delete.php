<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");

// check if id was sent throgh url ( get method )
if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "GET"){

    // sanitize the id 
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    // check if this id is exists in db 
    if(db_get_row("SELECT * FROM `users` WHERE `id`='$id' ")){
        // dd($id);
        // delete this row 
        $query = "DELETE FROM `users` WHERE `id`='$id' ";
        if(db_delete($query)){
            setSession('success',"deleted successsfully");
        }else{
            setSession('errors',['Error in deleting operation']);
        }
    }else{
        setSession('errors',['this id is not exist']);
    }
}

redirect("users/index");