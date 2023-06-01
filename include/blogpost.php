<?php
  $posts = $obj->post_display_publish();
?>

<div class="col-lg-8">
  <div class="all-blog-posts">
    <div class="row">

    <?php while($row=mysqli_fetch_assoc($posts)){ ?>
      <div class="col-lg-12">
        <div class="blog-post">
          <div class="blog-thumb">
            <img height="300px" src="upload/<?php echo $row['post_img'] ?>">
          </div>
          <div class="down-content">
            <span><?php echo $row['cat_name'] ?></span>
            <a href="">
              <h4><?php echo $row['post_title'] ?></h4>
            </a>
            <ul class="post-info">
              <li><a href="#"><?php echo $row['post_author'] ?></a></li>
              <li><a href="#"><?php echo $row['post_date'] ?></a></li>
              <li><a href="#"><?php echo $row['post_comment'] ?> Comments</a></li>
            </ul>
            <p><?php echo $row['post_sumary'] ?></p>
            <div class="post-options">
              <div class="row">
                <div class="col-6">
                  <ul class="post-tags">
                    <li><i class="fa fa-tags"></i></li>
                    <li><a href="#"><?php echo $row['post_tag'] ?></a>,</li>
                    
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="post-share">
                    <li><i class="fa fa-share-alt"></i></li>
                    <li><a href="#">Facebook</a>,</li>
                    <li><a href="#"> Twitter</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>


      

    </div>
  </div>
</div>