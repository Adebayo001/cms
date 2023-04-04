<?php include("includes/header.php"); ?>

<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>CMS</h4>
                        <h2>WELCOME TO MY CMS COURSE</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Page Content -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
               <?php
    if(isset($_POST['search'])){
        
        $search = $_POST['search'];
        
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query = mysqli_query($connection, $query);
        
        if(!$search_query){
            die("QUERY FAILED" . mysqli_error($connection));
        }
        
        $count = mysqli_num_rows($search_query);
        
        if($count == 0){
            
            echo "<h1> NO RESULT FOUND";
            
        } else {
              while($row = mysqli_fetch_assoc($search_query)){
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
                                    <img src="admin/images/<?php echo $post_image; ?>" alt="">
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
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } 
        }
    }
     ?>          
            </div>
            <?php include("includes/sidebar.php"); ?>
        </div>
    </div>
</section>


<?php include("includes/footer.php"); ?>
