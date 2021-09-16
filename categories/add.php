<?php require_once '../app/config.php'; ?>
<?php getFile(FOLDER_PATH."sessions"); ?>
<?php getFile(PREV_FOLDER."inc/header");   ?>

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="#" role="button">View All Categories </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Add New Categoery  </h1>
    <?php getFile(PREV_FOLDER."inc/message"); ?>
        
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?php url("handelers/categories/insert"); ?>">
                    <div class="form-group">
                        <label for="cat">Category Name</label>
                        <input type="text" name="name" class="form-control" id="cat" >
                    </div>
        
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php getFile(PREV_FOLDER."inc/footer");   ?>
