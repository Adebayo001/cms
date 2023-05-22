<?php include("includes/post-header.php");

    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    
        $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
        $post_count_query = mysqli_query($connection, $query);
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);
    
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
                    $post_title = $row['post_title'];
                }
                ?>
                        <h2><?php echo $post_title ?></h2>
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
                
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                $select_all_posts_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                                        
                ?>
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="/cms/admin/images/<?php echo $post_image; ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <span>Lifestyle</span>
                                    <a href="post-details.html">
                                        <h4><?php echo $post_title; ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#"><?php echo $post_author; ?></a></li>
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
                        <br><br> <br>
                    </div>
                </div>
                <?php } }
                else {
                    header("Location:index.php");
                }
                
                ?>

                <?php include("includes/comment.php"); ?>

            </div>
            <?php include("includes/sidebar.php"); ?>
        </div>
    </div>
</section>


<?php include("includes/footer.php"); ?>
