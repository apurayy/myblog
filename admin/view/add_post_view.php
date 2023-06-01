<?php

    $categoy_name = $obj->display_category();

    if(isset($_POST['add_post'])){
        $msg = $obj->add_post($_POST);
    }

?>


<h2>Add post page</h2>
<?php 
    if(isset($msg)){
        echo $msg;
    }
?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input name="post_title" class="form-control py-4" id="post_title" type="text"/>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_img">Post Thumbnail</label><br>
        <input name="post_img" class=" py-4" id="post_img" type="file"/>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_cat">Select Post Categoy</label>
        <select class="form-control" name="post_cat" id="post_cat">

            <?php while($category=mysqli_fetch_assoc($categoy_name)){?>
                <option value="<?php echo $category['cat_id'] ?>"><?php echo $category['cat_name'] ?></option>

            <?php }?>

        </select>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_sumary">Post Summery</label>
        <input name="post_sumary" class="form-control py-4" id="post_sumary" type="text"/>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tag</label>
        <input name="post_tag" class="form-control py-4" id="post_tag" type="text"/>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>
        <select name="post_status" id="post_status" class="form-control">
            <option value="1">Publish</option>
            <option value="0">Unpublish</option>
        </select>
    </div>

    <input type="submit" name="add_post" value="Add Post" class="form-control btn btn-primary">
</form>