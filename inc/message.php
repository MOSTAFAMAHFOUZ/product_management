<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
        <?php if(getSession('success')): ?>
            <div class="alert alert-success"> <?php echo successSession(); ?> </div>
        <?php endif; ?>
            <?php foreach(getErrors() as $error): ?>
                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>