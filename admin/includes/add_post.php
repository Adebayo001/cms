<?php 
if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
//    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y, H:i:s');
    
    move_uploaded_file($post_image_temp, "./images/$post_image");

    $get_author = $_SESSION['username'];
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_comment_count) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$get_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}', 0) ";
    
    $create_post_query = mysqli_query($connection, $query);
    confirmQuery($create_post_query);
}
?>
<div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Post</h5>
    <small class="text-muted float-end">Add Post</small>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="post-title">Post Title</label>
            <input type="text" class="form-control" name="post_title">
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
            <input type="text" class="form-control" name="post_author">
        </div> -->
        <div class="mb-3">
            <label class="form-label" for="post-status">Post Status</label>
            <select name="post_status" id="post_status" class="form-select">
                <option value='Published'>Publish</option>
                <option value='Draft'>Draft</option>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="post-image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label" for="post-tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="mb-3">
            <label for="summernote" class="form-label">Post Content</label>
            <textarea class="form-control" id="summernote" name="post_content"></textarea>
        </div>
        <button type="submit" name="create_post" class="btn btn-primary">Publish</button>
    </form>
</div>

