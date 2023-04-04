<?php 
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_post_by_id = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_post_by_id)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];                                                            
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }

    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
    //    $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        move_uploaded_file($post_image_temp, "./images/$post_image");
        
        if(empty($post_image)){
            
            $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
        }
        
        $get_author = $_SESSION['username'];

        $query = "UPDATE posts SET ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$get_author}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '$post_tags', ";
        $query .= "post_status = '$post_status' ";
        $query .= "WHERE post_id = {$the_post_id}";
        
        $update_query = mysqli_query($connection, $query);
        
        confirmQuery($update_query);
        
    }
?>
<div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Post</h5>
    <small class="text-muted float-end">Edit Post</small>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="post-title">Post Title</label>
            <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
        </div>
        <div class="mb-3">
            <label class="form-label" for="post-category_id">Post Category</label>
            <select name="post_category" id="post_category" class="form-select">
                <?php
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $query);
                        confirmQuery($select_categories);
                            while($row = mysqli_fetch_assoc($select_categories)){
                                $cat_id = $row['cat_id'];                    
                                $cat_title = $row['cat_title'];
                                echo "<option value='$cat_id'>{$cat_title}</option>";
                            }
            ?>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label class="form-label" for="post-author">Post Author</label>
            <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
        </div> -->
        <div class="mb-3">
            <label class="form-label" for="post-status">Post Status</label>
            <select name="post_status" id="post_status" class="form-select">
               <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
                <?php
                    if($post_status == 'Published'){
                    echo "<option value='Draft'>Draft</option>";
                    } else {
                        echo "<option value='Published'>Published</option>";
                    }
            ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="post-image">Post Image</label><br>
            <img width="100" src="./images/<?php echo $post_image ?>"><br><br>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label" for="post-tags">Post Tags</label>
            <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
        </div>
        <div class="mb-3">
            <label for="summernote" class="form-label">Post Content</label>
            <textarea class="form-control" id="summernote" name="post_content"><?php echo $post_content; ?>"</textarea>
        </div>
        <button type="submit" name="create_post" class="btn btn-primary">Update</button>
    </form>
</div>

