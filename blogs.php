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
                        <a href="projects.php" class="nav-link">Projects</a>
                    </li>
                    <li>
                        <a href="events.php" class="nav-link">Events</a>
                    </li>
                    <li>
                        <a href="blogs.php" class="nav-link active">Blogs</a>
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Blogs</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Blogs</span>
        </div>
    </div>
</section>

<!--Blog and news-->
<section class="blog-news py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row">
            <?php
            if (isset($_GET["q"]) && $_GET["q"] != "") {
                $object->query = "SELECT fill_form.firstname, fill_form.lastname, news.* FROM news INNER JOIN fill_form ON fill_form.form_id = news.created_by WHERE news_title LIKE '%" . $_GET["q"] . "%' OR news_content LIKE '%" . $_GET["q"] . "%' ORDER BY news_date DESC";
            } else {
                $object->query = "SELECT fill_form.firstname, fill_form.lastname, news.* FROM news INNER JOIN fill_form ON fill_form.form_id = news.created_by ORDER BY news_date DESC";
            }
            $result = $object->get_result();

            foreach ($result as $row) {
                $category = str_split($row["category"]);
                if ($category[0] == 1)
                    $category = "Donation";
                else if ($category[0] != 1 && $category[1] == 1)
                    $category = "Charity";
                else if ($category[0] != 1 && $category[1] != 1 && $category[2] == 1)
                    $category = "Medical";
                echo '
                <div class="col-md-4 mb-4" id="reveal-left-3">
                    <div class="blog-item position-relative">
                        <div class="blog-image">
                            <img src="admin/' . $row["news_photo_link"] . '" class="img" />
                            <span class="blog-tag">' . $category . '</span>
                        </div>
                        <div class="blog-content">
                            <ul class="d-flex align-items-center text-gray">
                                <li>
                                    <i class="fa-regular fa-user me-2 text-yellow"></i> By ' . $row["firstname"] . ' ' . $row["lastname"] . '
                                </li>
                                <li class="ms-4">
                                    <i class="fa-solid fa-calendar-days me-2 text-yellow"></i> ' . date("M d, Y", strtotime(($row["news_date"]))) . '
                                </li>
                            </ul>
                            <h4 class="my-3">
                                <a href="blog-single.php?news_id=' . $row["news_id"] . '" class="quicksand text-decoration-none text-dark">' . $row["news_title"] . '</a>
                            </h4>
                            <hr class="my-3" />
                            <a
                                href="blog-single.php?news_id=' . $row["news_id"] . '"
                                class="text-decoration-none text-gray"
                                style="font-size: 14px">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
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