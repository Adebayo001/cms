<?php
        $the_post_id = $_GET['p_id'];
?>
                  <br>
                  <div class="col-lg-12">
                  <div class="sidebar-heading">
                  <h2>Comments</h2>
                  </div>
                  <?php
                      $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                      $query .= "AND comment_status = 'Approved' ";
                      $query .= "ORDER BY comment_id DESC";
                      $comment_query = mysqli_query($connection, $query);
                      if(!$comment_query){
                          die('QUERY FAILED'. mysqli_error());
                      }
                                    
                      while($row = mysqli_fetch_assoc($comment_query)){
                          $author = $row['comment_author'];
                          $content = $row['comment_content'];
                          $date = $row['comment_date'];
                    ?>
                         <div class="sidebar-item comments">
                    <div class="content">
                      <ul>
                        <li>
                          <div class="author-thumb">
                            <img src="images/anonymous-icon.png" alt="">
                          </div>
                          <div class="right-content">
                            <h4><?php echo $author ?><span><?php echo $date ?></span></h4>
                            <p><?php echo $content ?></p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                         
                         <?php } ?>
                </div>
                <div class="col-lg-12">
                 <?php
                    if(isset($_POST['create_comment'])){
                    $comment_author = $_POST['author'];
                    $comment_email  = $_POST['email'];
                    $comment_content = $_POST['message'];

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status, comment_email, comment_date) ";
                    $query .= "VALUES ({$the_post_id}, '{$comment_author}', '{$comment_content}', 'Unapproved', '{$comment_email}', now())";
                    $create_comment_query = mysqli_query($connection, $query);
                        
                    // $query = "UPDATE posts SET post_comment_count = post_comment_count +1 ";
                    // $query .= "WHERE post_id = {$the_post_id}";
                    // $post_comment_count_query = mysqli_query($connection, $query);

    }

                    ?>
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input style="text-transform:none;" name="author" type="text" id="name" placeholder="Your Name" required>
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input style="text-transform:none;" name="email" type="email" id="email" placeholder="Your Email" required>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea style="text-transform:none;" name="message" rows="6" id="message" placeholder="Type your comment" required></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" name="create_comment" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>