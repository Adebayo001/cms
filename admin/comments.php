<?php include("includes/admin_header.php");?>
<?php include("includes/admin_aside.php"); ?>

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
                        <!-- Layout Demo -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                        <?php 
                                        if(isset($_GET['source'])){
                                            $source = $_GET['source'];
                                        } else {
                                            echo $source ="";
                                        }
                                        
                                        switch($source){
                                            case 'post_comment':
                                                include("includes/post_comment.php");
                                                break;
//                                            case 'edit_post':
//                                                include("includes/edit_post.php");
//                                                break;
                                            default:
                                                include("includes/view_all_comment.php");
                                                break;
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->


                    <?php include("includes/admin_footer.php"); ?>
