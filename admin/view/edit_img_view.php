<?php 

    if(isset($_GET['status'])){
        if($_GET['status']=='editimg'){
            $id = $_GET['id'];
        }
    }

    if(isset($_POST['change_img'])){
        $msg = $obj->edit_img($_POST);
    }

?>

<h2>Edit Images Page</h2>

<div class="shadow m-5 p-5">
    <h3 class="">
        <?php if(isset($msg)){echo $msg;} ?>
    </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="edit_img_id" id="" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_img">Change Thumbnail</label><br>
            <input name="change_img" class=" py-4" id="change_img" type="file"/>
        </div>
        <input type="submit" name="change_img" value="Change Thumbnail" class="btn btn-primary">
    </form>
</div>