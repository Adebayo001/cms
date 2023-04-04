<?php
if (isset($_GET['user_id'])) {
    $the_user_id = $_GET['user_id'];

    $query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
    $select_user_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_user_by_id)) {
        $user_id = $row['user_id'];
        //    $password = $row['user_password'];
        $username = $row['username'];
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $email = $row['user_email'];
        $image = $row['user_image'];
        $role = $row['user_role'];
    }

    if (isset($_POST['update_user'])) {
        $username = $_POST['username'];
        //    $password= $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        //        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $role = $_POST['user_role'];

        //        move_uploaded_file($post_image_temp, "./images/$post_image");

        //        if(empty($post_image)){
//            
//            $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
//            $select_image = mysqli_query($connection, $query);
//            while($row = mysqli_fetch_array($select_image)){
//                $post_image = $row['post_image'];
//            }
//        }
        //    $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=> 12));

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        //    $query .= "user_password = '{$hashed_password}', ";
        $query .= "user_firstname = '{$firstname}', ";
        $query .= "user_lastname = '{$lastname}', ";
        //        $query .= "post_image = '{$post_image}', ";
        $query .= "user_email = '{$email}', ";
        $query .= "user_role = '{$role}' ";
        $query .= "WHERE user_id = {$the_user_id}";

        $update_user_query = mysqli_query($connection, $query);

        confirmQuery($update_user_query);


        echo "<p class='text-success'>User Updated</p>" . "<p class='text-danger'><a href='users.php'>View Users</a></p>";

    }
} else {
    header("Location: index.php");
}

?>
<div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">User</h5>
    <small class="text-muted float-end">Edit User</small>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" value="<?php echo $firstname; ?>" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label class="form-label" for="lastname">Last Name</label>
            <input type="text" value="<?php echo $lastname; ?>" class="form-control" name="lastname">
        </div>
<!--
        <div class="mb-3">
            <label class="form-label" for="post-image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
-->
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" for="role">Role</label>
            <select name="user_role" id="user_role" class="form-select">
               <option value='<?php echo $role; ?>'><?php echo $role; ?></option>
                <?php
                    if($role == 'admin'){
                    echo "<option value='subscriber'>subscriber</option>";
                    } else {
                        echo "<option value='admin'>admin</option>";
                    }
            ?>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" value="" class="form-control" name="password">
        </div> -->
        <button type="submit" name="update_user" class="btn btn-primary">Update</button>
    </form>
</div>
