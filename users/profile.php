<?php require_once '../app/config.php'; ?>
<?php getFile(FOLDER_PATH."sessions"); ?>
<?php getFile(PREV_FOLDER."inc/header");   ?>


    <div class="container">
        <div class="row my-5">
            <div class="col-10 mx-auto">
                <div class="card" style="">
                    <div class="card-header">
                        Info
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> Name :  </b> <?php echo getSession('user')['user_name']?></li>
                        <li class="list-group-item"><b> Email : </b> <?php echo getSession('user')['user_email']?></li>
                        <li class="list-group-item"><b> Type :  </b> <?php echo getSession('user')['user_type']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php getFile(PREV_FOLDER."inc/footer");   ?>