<?php
include('admin/main.php');
$object = new batch_details();
include 'header.php';
?>

<!-- Header -->
<div id="topbar">
    <div class="container px-0 px-lg-5">
        <div
            class="d-flex justify-content-between py-3 align-items-center custom-border-bottom-yellow z-index">
            <button
                class="custom-btn d-lg-none bg-yellow rounded-normal ms-3"
                style="font-size: 18px"
                id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="index.php"><img src="img/logo2.png" width="180" /></a>
            <div class="sam" id="nav">
                <ul class="nav">
                    <li>
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="about.php" class="nav-link">About Us</a>
                    </li>
                    <li>
                        <a href="projects.php" class="nav-link active">Projects</a>
                    </li>
                    <li>
                        <a href="events.php" class="nav-link">Events</a>
                    </li>
                    <li>
                        <a href="blogs.php" class="nav-link">Blogs</a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <a
                href="donate.php"
                class="custom-btn bg-green hover-dark-blue rounded me-3 me-lg-0"
                style="font-size: 13px">
                DONATE NOW
            </a>
        </div>
    </div>
</div>

<!--banner-top-->
<section class="banner-top">
    <div class="banner-overlayer"></div>
    <div
        class="container px-4 px-lg-5 d-flex flex-column justify-content-center align-items-center h-100">
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Projects</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Projects</span>
        </div>
    </div>
</section>

<!--Our Projects-->
<section class="our-projects py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row g-4">
            <?php
            $object->query = "SELECT * FROM projects";

            $results = $object->get_result();

            foreach ($results as $row) {
                echo '      
            <div class="col-md-6" id="reveal-down">
                <div class="project-item position-relative">
                    <img src="admin/' . $row["project_photo"] . '" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="project-single.php?project_id=' . $row["project_id"] . '" class="text-white text-decoration-none">' . $row["project_title"] . '</a>
                        </h4>
                        <a
                            href="project-single.php?project_id=' . $row["project_id"] . '"
                            class="text-decoration-none next-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>