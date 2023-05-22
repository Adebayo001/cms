<?php include("includes/header.php"); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
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
<!-- Banner Ends Here -->
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                $page_per = 5;
                if(isset($_GET['page'])){
                    
                    $page = ($_GET['page']);
                    
                } else {
                    $page = "";
                }
                
                if($page == "" || $page == 1){
                    
                    $page_1 = 0;
                    
                } else {
                    $page_1 = ($page * $page_per) - $page_per;
                }
                $count_query = "SELECT * FROM posts WHERE post_status = 'Published'";
                $post_count_query = mysqli_query($connection, $count_query);
                $count = mysqli_num_rows($post_count_query);

                if($count < 1) {

                    echo "<h2>No Post Available</h2>";
                } else {
                $count = ceil($count / $page_per);
                
                $query = "SELECT * FROM posts WHERE post_status = 'Published' LIMIT $page_1, $page_per";
                $select_all_posts_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                ?>
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <a href="post/<?php echo $post_id ?>" class="href">
                                        <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <!--                                    <span>Lifestyle</span>-->
                                    <a href="post/<?php echo $post_id ?>">
                                        <h4><?php echo $post_title; ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="author_post.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>"><?php echo $post_author; ?></a></li>
                                        <li><a href="#"><?php echo $post_date; ?></a></li>
                                        <!--                                        <li><a href="#">12 Comments</a></li>-->
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
                                <a href="post/<?php echo $post_id ?>">Read More</a>
                            </div>
                        </div>
                        <br><br> <br>
                    </div>
                </div> <br>
                <?php } } ?>
                <!-- Basic Pagination -->
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center">
                           <?php
                              
                              for($i = 1; $i<=$count; $i++){
                                  
                                  if($i == $page){
                                  
                                  echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                                  } else {
                                      echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                                  }
                                  
                              }
                              
                              ?>
                          </ul>
                        </nav>
            </div>
            <?php include("includes/sidebar.php"); ?>
        </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>
