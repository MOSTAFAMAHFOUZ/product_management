<?php require_once '../app/config.php'; ?>
<?php getFile(FOLDER_PATH."database"); ?>
<?php getFile(FOLDER_PATH."sessions"); ?>
<?php getFile(PREV_FOLDER."inc/header");   ?>

   
<div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="<?php url('products/add') ?>" role="button">Add New Product </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Products  </h1>
    <?php getFile(PREV_FOLDER."inc/message"); ?>


    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php 
                        $query = "SELECT *,categories.name AS c_name,categories.id AS c_id,products.id AS p_id,products.name AS p_name
                         FROM `products` INNER JOIN `categories` ON categories.id=products.category_id ";
                        foreach(db_get_all($query) as $row):
                    ?>
                    <tr>
                        <th scope="row"><?php iteration(); ?></th>
                        <td><?php echo $row['c_name'];?></td>
                        <td> <?= $row['p_name']; ?> </td>
                        <td><?= $row['price']; ?> </td>
                        <td><?= $row['qty']; ?> </td>
                        <td>
                            <a href="<?php full_url('products/edit.php?id='.$row['p_id']); ?>" class="btn btn-info">Edit <i class="bi bi-pencil-square"></i></a>
                            <a href="<?php full_url('handelers/products/delete.php?id='.$row['p_id']); ?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
                </table>

               
            </div>
        </div>
    </div>


    <?php getFile(PREV_FOLDER."inc/footer");   ?>
