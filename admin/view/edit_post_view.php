<?php

    if(isset($_GET['status'])){
        if($_GET['status']=='editpost'){
            $id = $_GET['id'];
            $postinfo=$obj->post_info_data($id);
        }
    }

?>

<h2>Update Content</h2>

<div class="shadow m-5 p-5">

    <input type="text" value="<?php echo $postinfo['post_title'];?>">
   

    <form action="" method="post">

        <input type="hidden" name="edit_post_id" id="" value="<?php echo $id ?>">

        <div class="form-group">
            <label class="mb-1" for="change_title">Change Title</label><br>
            <input name="change_title" value="12" class="form-control py-4" id="change_title" type="text"/>
        </div>

        <div class="form-group">
            <label class="mb-1" for="change_content">Change Content</label><br>
            <textarea value="<?php echo $postinfo['post_content'] ?>" class="form-control py-4" name="change_content" id="change_content" cols="30" rows="05"></textarea>
        </div>

        <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </form>
</div>