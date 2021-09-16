<?php require_once '../app/config.php'; ?>
<?php getFile(FOLDER_PATH."sessions"); ?>
<?php getFile(PREV_FOLDER."inc/header");   ?>

<div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php url('users/index'); ?>" role="button">View All Users </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Add New User  </h1>
    <?php getFile(PREV_FOLDER."inc/message"); ?>


    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?php url("handelers/users/insert"); ?>">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" name="name" value="<?php old('name') ?>" class="form-control" id="name" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php old('email') ?>" class="form-control" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" class="form-control" id="pass" >
                    </div>
        
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

<?php getFile(PREV_FOLDER."inc/footer");   ?>