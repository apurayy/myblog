<?php
    $posts = $obj->post_display();
?>


<h2>Manage post page</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumb</th>
                <th>Category</th>
                <th>Author</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

            <?php while($row = mysqli_fetch_assoc($posts)){ ?>
                <tr>
                <td><?php echo $row['post_id'] ?></td>
                <td><?php echo $row['post_title'] ?></td>
                <td><?php echo $row['post_sumary'] ?></td>
                <td><img height="100px" src="../upload/<?php echo $row['post_img'] ?>"></td>
                <td><?php echo $row['cat_name'] ?></td>
                <td><?php echo $row['post_author'] ?></td>
                <td><?php echo $row['post_date'] ?></td>
                <td><?php if($row['post_status']==1){
                    echo "Publised";
                }else{
                    echo "Unpublised";
                } ?></td>
                <td>
                    <a class="btn btn-primary" href="#">Edit</a><br><br>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
                </tr>

            <?php }?>    

    </table>
</div>