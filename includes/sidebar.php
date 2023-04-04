<div class="col-lg-4">


    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" method="post" action="search.php">
                        <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <?php
               $post_query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY post_date DESC LIMIT 5";
                $select_recent_post_query = mysqli_query($connection, $post_query);
                ?>
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Recent Posts</h2>
                    </div>
                    <?php 
                            while($row = mysqli_fetch_assoc($select_recent_post_query)){
                                $post_title = $row['post_title'];
                                $post_date = $row['post_date'];
                            ?>
                    <div class="content">
                        <ul>
                            <li><a href="post-details.html">
                                    <h5><?php echo $post_title; ?></h5>
                                    <span><?php echo $post_date; ?></span>
                                </a></li>

                        </ul>
                    </div>
                               <?php } ?>
                </div>
            </div>
            <div class="col-lg-12">
                <?php
                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection, $query);
                ?>
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <?php
                          while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                              $cat_id = $row['cat_id'];
                              $cat_title = $row['cat_title'];
                    
                    echo "<li>
                <a class='nav-link' href='category.php?category={$cat_id}'>{$cat_title}</a>
              </li>";
                    
                }
                          ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Motivation</a></li>
                            <li><a href="#">PSD</a></li>
                            <li><a href="#">Responsive</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
