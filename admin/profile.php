<?php include("includes/admin_header.php");?>
<?php include("includes/admin_aside.php"); ?>

<?php 
        if(isset($_POST['update_profile'])){
        $username = $_POST['username'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $session_username = $_SESSION['username'];
        
//        move_uploaded_file($post_image_temp, "./images/$post_image");
        
//        if(empty($post_image)){
//            
//            $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
//            $select_image = mysqli_query($connection, $query);
//            while($row = mysqli_fetch_array($select_image)){
//                $post_image = $row['post_image'];
//            }
//        }
//        
//        
        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_firstname = '{$firstname}', ";
        $query .= "user_lastname = '{$lastname}', ";
//        $query .= "post_image = '{$post_image}', ";
        $query .= "user_email = '{$email}', ";
        // $query .= "user_role = '{$role}' ";
        $query .= "WHERE username = '{$session_username}'";
        
        $update_user_query = mysqli_query($connection, $query);
        
        confirmQuery($update_user_query);
        
    }


?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->


            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include("includes/admin_nav.php"); ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                                    </li>
                                    <!--
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html">
                      <i class="bx bx-link-alt me-1"></i> Connections</a>
                    </li>
-->
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload new photo</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>

                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $_SESSION['firstname']; ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $_SESSION['lastname']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
                                                </div>
                                                
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" name="update_profile" class="btn btn-primary me-2">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <!-- <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                                                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                                            </div>
                                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->


                    <?php include("includes/admin_footer.php"); ?>
