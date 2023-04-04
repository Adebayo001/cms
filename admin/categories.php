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
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Categories</h5>
                                        <small class="text-muted float-end">Add Category</small>
                                    </div>
                                    <?php addCategory();  ?>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="form-label" for="cat-title">Enter Category Name</label>
                                                <input type="text" class="form-control" name="cat_title">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                                        </form>
                                    </div>

                                    <?php
                                    if(isset($_GET['edit'])) {
                                        $cat_id = $_GET['edit'];
                                        include("includes/update_category.php");
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Title</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php findAllCategories(); ?>
                                                <?php deleteQuery(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->


                    <?php include("includes/admin_footer.php"); ?>
