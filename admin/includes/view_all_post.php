<?php 
    include("delete_modal.php");
    if(isset($_POST['checkBoxArray'])){
        $checkBox = $_POST['checkBoxArray'];
        foreach($checkBox as $postValue){
             $bulk_options = $_POST['bulk_options'];
            
            switch($bulk_options){
                case 'Published':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValue}";
                    $publish_query = mysqli_query($connection, $query);
                    confirmQuery($publish_query);
                    break;
                 case 'Draft':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValue}";
                    $draft_query = mysqli_query($connection, $query);
                    confirmQuery($draft_query);
                    break;
                  case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = {$postValue}";
                    $delete_bulk_query = mysqli_query($connection, $query);
                    confirmQuery($delete_bulk_query);
                    break;
                case 'clone':
                    $query = "SELECT * FROM posts WHERE post_id = {$postValue}";
                    $select_posts_query = mysqli_query($connection, $query);
                    confirmQuery($select_posts_query);
                    while($row = mysqli_fetch_assoc($select_posts_query)){
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_content = $row['post_content'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];                                                            
                        $post_comment_count = $row['post_comment_count'];                                                            
                        $post_date = $row['post_date'];
                        $post_views_count = $row['post_views_count'];
                    }
                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_comment_count, post_views_count) ";
                    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', 'Draft', 0, 0) ";

                    $create_post_query = mysqli_query($connection, $query);
                    confirmQuery($create_post_query);
            }
            
        }
    }

?>

<div class="card">
    <br>
    <form action="" method="post">
      <div class="row">
       <div id="formOption" class="col-lg-4 col-md-6 mb-4">
                <select name="bulk_options" id="" class="form-select">
                    <option value="">Select Options</option>
                    <option value="Published">Published</option>
                    <option value="Draft">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                    
                </select>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <input type="submit" class="btn btn-success" name="" id="" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-dark table-hover">
                <thead class="table-dark">
                    <tr>
                        <th> <input type="checkbox" id="checkAllBoxes" class="form-check-input mt-0"></th>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $select_all_posts_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];                                                            
                $post_comment_count = $row['post_comment_count'];                                                            
                $post_date = $row['post_date']; 
                $post_views_count = $row['post_views_count'];
                        echo "<tr>";
                ?>
                    <td><input type="checkbox" id="checkBox" name="checkBoxArray[]" value="<?php echo $post_id; ?>" class="checkBox"></td>
                    <?php 
                
                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_author}</td>";
                        echo "<td>{$post_title}</td>";
                
                $catquery = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $select_category = mysqli_query($connection, $catquery);
                
                while($row = mysqli_fetch_array($select_category)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    
                        echo "<td>{$cat_title}</td>";
                }

                        echo "<td>{$post_status}</td>";
                        echo "<td><img width = '100' src = './images/{$post_image}'></td>";
                        echo "<td>{$post_tags}</td>";
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                    $send_query = mysqli_query($connection, $query);
                    $count_comment = mysqli_num_rows($send_query);
                        echo "<td><a href='comments.php?source=post_comment&id=$post_id'>{$count_comment}</a></td>";
                        
                        echo "<td>{$post_date}</td>";
                        echo "<td>{$post_views_count}</td>";
                        echo "<td>
                                <div class='dropdown'>
                                <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='bx bx-dots-vertical-rounded'></i>
                                </button>
                                <div class='dropdown-menu'>
                                <a class='dropdown-item' href='../post.php?p_id=$post_id' target='_blank'><i class='bx bx-low-vision me-1'></i> View</a>
                                <a class='dropdown-item' href='posts.php?source=edit_post&p_id=$post_id'><i class='bx bx-edit-alt me-1'></i> Edit</a>
                                <a class='dropdown-item' href='posts.php?reset=$post_id'><i class='bx bx-edit-alt me-1'></i>Reset Views</a>
                                <a class='dropdown-item' onClick =\"javascript: return confirm('Are you sure you want to delete?')  \" href='posts.php?delete=$post_id'><i class='bx bx-eraser me-1'></i> Delete</a>
                            </div>
                            </div>
                            </td>";

                    echo "</tr>";

                }
     ?>
                </tbody>
            </table>
            <?php
    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }
            
    if(isset($_GET['reset'])){
        $the_post_id = $_GET['reset'];
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";
        $reset_query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }
    ?>
        </div>
    </form>
    </div>
