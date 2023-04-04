<?php include("includes/post-header.php");

    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
        $the_post_author = $_GET['author'];
        
        $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' AND post_status = 'Published'";
        $select_all_posts_query = mysqli_query($connection, $query);
    }
 ?>


<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Post Details</h4>
                        <?php
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_author = $row['post_author'];
                }
                ?>
                        <h2><?php echo $post_author; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="main-banner header-text">
</div>
<!-- Banner Ends Here -->
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                
                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' AND post_status = 'Published'";
                $select_all_posts_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = substr($row['post_content'], 0, 200);
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                                        
                ?>
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                   <a href="post.php?p_id=<?php echo $post_id ?>" class="href">
                                    <img src="admin/images/<?php echo $post_image; ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <span>Lifestyle</span>
                                    <a href="post.php?p_id=<?php echo $post_id ?>">
                                        <h4><?php echo $post_title; ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li>by <?php echo $post_author; ?></li>
                                        <li><a href="#"><?php echo $post_date; ?></a></li>
                                        <li><a href="#">12 Comments</a></li>
                                    </ul>
                                    <p><?php echo $post_content; ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#"><?php echo $post_tags; ?></a></li>

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
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>
                        <br><br> <br>
                    </div>
                </div>
                <?php } ?>

            </div>
            <?php include("includes/sidebar.php"); ?>
        </div>
    </div>
</section>


<?php include("includes/footer.php"); ?>
