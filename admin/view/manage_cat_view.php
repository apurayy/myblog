<?php

    $catdata = $obj->display_category();
    if(isset($_GET['status'])){
        if($_GET['status']=='delet'){
            $deletid = $_GET['id'];
            $msj = $obj->delet_category($deletid);
        }
    }

?>

<h2>Manage category page</h2>

<?php
    if(isset($msj)){
        echo $msj;
    }
?>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Category Name</td>
            <td>Category Description</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php while($row = mysqli_fetch_assoc($catdata)){ ?>
            <td><?php echo $row['cat_id'] ?></td>
            <td><?php echo $row['cat_name'] ?></td>
            <td><?php echo $row['cat_des'] ?></td>
            <td>
            <a class="btn btn-primary" href="#">Edit</a>
            <a class="btn btn-danger" href="?status=delet&&id=<?php echo $row['cat_id'] ?>">Delete</a>
            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>