<?php 
if(isset($_POST['create_user'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
   
//    move_uploaded_file($post_image_temp, "./images/$post_image");
    
    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) ";
    $query .= "VALUES('{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$email}', '{$role}') ";
    
    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);
}
?>
<div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">User</h5>
    <small class="text-muted float-end">Add User</small>
</div>
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label class="form-label" for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname">
        </div>
<!--
        <div class="mb-3">
            <label class="form-label" for="post-image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
-->
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" for="role">Role</label>
            <select name="role" id="role" class="form-select">
              <option value='admin'>admin</option>
              <option value='subscriber'>subscriber</optioin>
            </select>
            <!-- <input type="text" class="form-control" name="role"> -->
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" name="create_user" class="btn btn-primary">Add User</button>
    </form>
</div>
