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
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Congratulations <?php echo $_SESSION['username']; ?>! 🎉</h5>
                                                <p class="mb-4">
                                                    You have done <span class="fw-bold">50%</span> in your CMS course.
                                                </p>

                                                <a href="profile.php" class="btn btn-sm btn-outline-primary">View Profile</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-8 col-6 order-1">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-3 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class="bx bx-pin rounded"></i>
                                                        <!--                                                        <img src="assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />-->
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="posts.php">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Posts</span>
                                                <?php
                                                    $query = "SELECT * FROM posts";
                                                    $select_post = mysqli_query($connection, $query);
                                                    $count_post = mysqli_num_rows($select_post);
                                                ?>
                                                <h3 class="card-title mb-2 fw-semibold"><?php echo $count_post; ?></h3>
                                                <!--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-3 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class="menu-icon tf-icons bx bx-user rounded"></i>
                                                        <!--                                                        <img src="assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />-->
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Users</span>
                                                <?php
                                                    $query = "SELECT * FROM users";
                                                    $select_user = mysqli_query($connection, $query);
                                                    $count_user = mysqli_num_rows($select_user);
                                                ?>
                                                <h3 class="card-title text-nowrap mb-1 fw-semibold"><?php echo $count_user; ?></h3>
                                                <!--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>-->
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-lg-3 col-md-6 col-3 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class="menu-icon tf-icons bx bx-comment-detail rounded"></i>
                                                        <!--                                                        <img src="assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />-->
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="comments.php">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Comments</span>
                                                <?php
                                                    $query = "SELECT * FROM comments";
                                                    $select_comment = mysqli_query($connection, $query);
                                                    $count_comment = mysqli_num_rows($select_comment);
                                                ?>
                                                <h3 class="card-title mb-2 fw-semibold"><?php echo $count_comment; ?></h3>
                                                <!--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>-->
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-lg-3 col-md-6 col-3 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class="menu-icon tf-icons bx bx-collection rounded"></i>
                                                        <!--                                                        <img src="assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />-->
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="categories.php">View More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Categories</span>
                                                <?php
                                                    $query = "SELECT * FROM categories";
                                                    $select_categories = mysqli_query($connection, $query);
                                                    $count_category = mysqli_num_rows($select_categories);
                                                ?>
                                                <h3 class="card-title mb-2 fw-semibold"><?php echo $count_category; ?></h3>
                                                <!--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-8">
                                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                                            <?php // Pending Post
                                                $query = "SELECT * FROM posts WHERE post_status = 'Draft'";
                                                $select_draft_query = mysqli_query($connection, $query);
                                                $count_draft = mysqli_num_rows($select_draft_query);
                                                // Active Post
                                                $query = "SELECT * FROM posts WHERE post_status = 'Published'";
                                                $select_publish_query = mysqli_query($connection, $query);
                                                $count_published = mysqli_num_rows($select_publish_query);
                                                // Admin User
                                                $query = "SELECT * FROM users WHERE user_role = 'admin'";
                                                $select_admin_query = mysqli_query($connection, $query);
                                                $count_admin = mysqli_num_rows($select_draft_query);
                                                // Subscriber User
                                                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                                                $select_sub_query = mysqli_query($connection, $query);
                                                $count_sub = mysqli_num_rows($select_sub_query);
                                                //Comment approve
                                                $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
                                                $select_approve_query = mysqli_query($connection, $query);
                                                $count_approve = mysqli_num_rows($select_approve_query);
                                                // Comment Unapprove
                                                $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved'";
                                                $select_unapprove_query = mysqli_query($connection, $query);
                                                $count_unapprove = mysqli_num_rows($select_unapprove_query);
                                                
                                                
                                            ?>
                                            <script type="text/javascript">
                                                google.charts.load('current', {
                                                    'packages': ['bar']
                                                });
                                                google.charts.setOnLoadCallback(drawChart);

                                                function drawChart() {
                                                    var data = google.visualization.arrayToDataTable([
                                                        ['Data', 'All', 'Pending', 'Active'],
                                                        <?php 
                                                        $element_item = ['Posts', 'Users', 'Comments'];
                                                        $element_data = [$count_post, $count_user, $count_comment];
                                                        $element_pending = [$count_draft, $count_sub, $count_unapprove];
                                                        $element_active = [$count_published, $count_admin, $count_approve];
                                                        
                                                        for($a = 0; $a < 3; $a++){
                                                            echo "['{$element_item[$a]}'" . "," . "{$element_data[$a]}" . "," . "{$element_pending[$a]}" . "," . "{$element_active[$a]}],";
                                                        }
                                                        
                                                    ?>
                                                    ]);

                                                    var options = {
                                                        chart: {
                                                            title: '',
                                                            subtitle: '',
                                                        }
                                                    };

                                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                                }

                                            </script>
                                            <!--                                            <div id="totalRevenueChart" class="px-2"></div>-->
                                        </div>
                                        <div id="columnchart_material" style="width: 'auto'x; height: 400px;"></div>
<!--
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            2022
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="growthChart"></div>
                                            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <small>2022</small>
                                                        <h6 class="mb-0">$32.5k</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <small>2021</small>
                                                        <h6 class="mb-0">$41.2k</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
-->
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Revenue -->
                        </div>
                    </div>
                </div>
                <!-- / Content -->


                <?php include("includes/admin_footer.php"); ?>
