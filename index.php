<?php
include('admin/main.php');
$object = new batch_details();
include('header.php');

$ipAddress = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('Asia/Dhaka');

// Get the current date
$visitDate = date("Y-m-d");
$visitTime = date("Y-m-d H:i:s");

// Check if this IP address has already visited today
$object->query = "SELECT * FROM visitors WHERE ip_address = '$ipAddress' AND visit_date = '$visitDate'";
$object->execute();
$result = $object->get_result();
if ($object->row_count() == 0) {
    // Insert the new visitor
    $object->query = "INSERT INTO visitors (ip_address, visit_date, visit_time) VALUES ('$ipAddress', '$visitDate', '$visitTime')";
    $object->execute();
} else {
    // Update the visitor
    $object->query = "UPDATE visitors SET visit_time = '$visitTime', visit_date = '$visitDate' WHERE ip_address = '$ipAddress'";
    $object->execute();
}
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
                        <a href="index.php" class="nav-link active">Home</a>
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

<!-- Banner -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php
        $object->query = "SELECT * FROM gallery WHERE show_in_slider = '1'";

        $result = $object->get_result();

        foreach ($result as $row) {
            echo '
        <div class="swiper-slide position-relative">
            <div class="banner" style="background-image: url(\'admin/' . $row["photo_link"] . '\');"></div>
            <div class="background-overlay"></div>
            <div
                class="d-flex justify-content-center align-items-center banner-text flex-column">
                <h6
                    class="text-white text-center quicksand text-uppercase my-4 animate__animated animate__zoomIn">
                    We are here to change the world
                </h6>
                <h1
                    class="text-white text-center quicksand animate__animated animate__fadeInUp animate__delay-1s">
                    Let\'s work together to<br />
                    Save A Smile
                </h1>
                <p
                    class="text-white text-center quicksand banner-text-desc mt-3 animate__animated animate__fadeInUp animate__delay-2s">
                    Save A Smile Foundation is a non-profit voluntary organization
                    conducted by the students of different SSC batches for quality
                    education, proper health and hygiene and environment protection.
                </p>
                <a
                    href="about.php"
                    class="custom-btn bg-yellow hover-dark-blue rounded mt-4 animate__animated animate__fadeInUp animate__delay-3s"
                    style="font-size: 16px">
                    LEARN MORE
                </a>
            </div>
        </div>
        ';
        }
        ?>
    </div>
    <div class="banner-button">
        <button class="banner-button-previous mb-3 active">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="banner-button-next">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>

<!--About Us-->
<section class="about-us py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row">
            <div class="col-md-6 position-relative mb-4 mb-lg-0" id="reveal-left">
                <img src="img/about_img.jpg" class="about-img about-img-1" />
                <img src="img/card1.jpg" class="about-img about-img-2" />
                <img src="img/about-dot.png" class="about-img about-dot" />
            </div>
            <div class="col-md-6">
                <p
                    class="text-yellow quicksand fw-bold"
                    id="reveal-up"
                    style="font-size: 16px">
                    <i class="fa-solid fa-angles-left me-2"></i> ABOUT US
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4" id="reveal-up">
                    Discover Save A Smile Foundation
                </h1>
                <p
                    class="text-secondary quicksand my-4"
                    style="font-size: 16px; text-align: justify"
                    id="reveal-up">
                    Save A Smile Foundation, a student-led non-profit in Chittagong
                    Hill Tracts, Bangladesh, established in 2017, focuses on societal
                    betterment. With over 200 members, it implements humanitarian
                    programs, including medical aid, educational support, and
                    seminars, aiming for nationwide development.
                </p>
                <div class="row" id="reveal-down">
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Immediate
                                Assistance
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                Support
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Immediate
                                Assistance
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                Support
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex align-items-center my-4">
                    <div class="d-flex align-items-center me-4" id="reveal-right">
                        <div class="founder-photo me-3">
                            <img src="img/f1.png" />
                        </div>
                        <div class="founder-desc">
                            <h6 class="merriweather fw-bold">Himel Chakma</h6>
                            <p
                                class="text-yellow text-uppercase m-0"
                                style="font-size: 13px">
                                Co-Founder & Advisor
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center" id="reveal-right-2">
                        <div class="founder-photo me-3">
                            <img src="img/f2.jpg" />
                        </div>
                        <div class="founder-desc">
                            <h6 class="merriweather fw-bold">Lampra Tripura</h6>
                            <p
                                class="text-yellow text-uppercase m-0"
                                style="font-size: 13px">
                                Co-Founder & Advisor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-4" id="reveal-down">
                    <a
                        href="about.php"
                        class="custom-btn bg-yellow hover-dark-blue rounded py-2"
                        style="font-size: 16px; display: inline-block;">
                        LEARN MORE
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--counter area-->
<section class="counter-area py-5">
    <div class="counter-area-overlayer"></div>
    <div class="container py-5 px-5 px-lg-5">
        <div class="row">
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-left-2">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">2500</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total Happy People
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-left">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-regular fa-handshake"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">200</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total Our Members
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-right">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">20</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Event Completed
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center"
                id="reveal-right-2">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">200</span>K+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total Donation
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Our Mission-->
<section class="our-mission py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row">
            <div class="col-md-7">
                <p
                    class="text-yellow quicksand fw-bold"
                    style="font-size: 16px"
                    id="reveal-up">
                    <i class="fa-solid fa-angles-left me-2"></i> OUR MISSION
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4" id="reveal-up">
                    Our Mission & Goals
                </h1>
                <p
                    class="text-gray quicksand my-4"
                    id="reveal-up"
                    style="font-size: 16px">
                    Save A Smile Foundation is a non-profit voluntary organization
                    conducted by the students of different SSC batches for quality
                    education, proper health and hygiene and environment protection.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <div class="d-flex mb-4" id="reveal-left">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-brainstorm-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Inspiring Young Minds</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Inspiring young minds for a healthier tomorrow.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" id="reveal-left-2">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-graduate-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Empowering Youth</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Empowering Youth, Transforming Communities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex mb-4" id="reveal-left">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-health-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">LUH</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Listeting, Understanding and Healing.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" id="reveal-left-2">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-mental-health-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Health Education</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Inspiring future leaders for healthier communities.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Get Involved-->
<section class="counter-area py-5">
    <div class="counter-area-overlayer"></div>
    <div class="container py-5 px-5 px-lg-5">
        <div
            class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-white quicksand fw-bold text-center" id="reveal-up">
                Welcome To <span class="text-yellow">Save A Smile Foundation</span><br />
                Want to make a Positive Impact?
            </h1>
            <p class="text-white quicksand my-4" id="reveal-left">
                Only when the society comes together and contributeswe will be able
                to make an impact.
            </p>
            <a
                href="get_involed.php"
                class="custom-btn bg-yellow hover-dark-blue rounded px-4" id="reveal-down"
                style="font-size: 16px">
                Donate Now
            </a>
        </div>
    </div>
</section>

<!--Our Projects-->
<section class="our-projects py-5">
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-yellow quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> OUR PROJECTS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1 class="quicksand fw-bold text-center my-4 mb-5" id="reveal-up">
            Works Across The Country
        </h1>
        <div class="row g-4">
            <?php
            $object->query = "SELECT * FROM projects LIMIT 4";

            $result = $object->get_result();

            foreach ($result as $row) {
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

<!--Upcoming Events-->
<?php
$object->query = "SELECT * FROM events WHERE event_date >= CURDATE()";

$object->execute();

if ($object->row_count() > 0) {
?>
    <section class="upcoming-events py-5">
        <div class="event-overlayer"></div>
        <div class="container py-5 px-4 px-lg-5">
            <p
                class="text-yellow quicksand fw-bold text-center"
                style="font-size: 16px"
                id="reveal-up">
                <i class="fa-solid fa-angles-left me-2"></i> UPCOMING EVENTS
                <i class="fa-solid fa-angles-right ms-2"></i>
            </p>
            <h1
                class="quicksand fw-bold text-center text-white my-4 mb-5"
                id="reveal-up">
                Get Involved in Our Events
            </h1>
            <div class="row justify-content-center">
                <?php
                $result = $object->get_result();

                foreach ($result as $row) {
                    echo '
                <div class="col-md-8 blog-item" id="reveal-left">
                    <div class="row">
                        <div class="col-md-4 p-0">
                            <div class="blog-image" style="height: 100%">
                                <img src="admin/' . $row["event_photo"] . '" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div
                                class="blog-content d-flex flex-column justify-content-center">
                                <ul class="d-flex align-items-center text-gray">
                                    <li>
                                        <i class="fa-solid fa-location-dot me-2 text-yellow"></i>
                                        ' . $row["event_location"] . '
                                    </li>
                                    <li class="ms-4">
                                        <i class="fa-regular fa-clock me-2 text-yellow"></i> ' . date('H:i A', strtotime($row["event_start_time"])) . '
                                    </li>
                                    <li class="ms-4">
                                        <i class="fa-solid fa-calendar-days me-2 text-yellow"></i>
                                        ' . date('d M, Y', strtotime($row["event_date"])) . '
                                    </li>
                                </ul>
                                <h4 class="my-3">
                                    <a href="event-single.php?event_id=' . $row["event_id"] . '" class="quicksand text-decoration-none text-dark">' . $row["event_name"] . '</a>
                                </h4>
                                <p class="text-gray mb-3" style="font-size: 14px">
                                    ' . $row["event_short_description"] . '
                                </p>
                                <a
                                    href="event-single.php?event_id=' . $row["event_id"] . '"
                                    class="text-decoration-none text-gray"
                                    style="font-size: 14px">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                            </div>
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
}
?>

<!--Blog and news-->
<section class="blog-news py-5">
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-yellow quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> BLOG & NEWS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1 class="quicksand fw-bold text-center my-4 mb-5" id="reveal-up">
            Latest Blog & News
        </h1>
        <div class="row">
            <?php
            $object->query = "SELECT fill_form.firstname, fill_form.lastname, news.* FROM news INNER JOIN fill_form ON fill_form.form_id = news.created_by ORDER BY news_date DESC LIMIT 3";

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

<script>
    $(document).ready(function() {
        $(".counter").counterUp({
            delay: 10,
            time: 2000,
        });
    });
</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        centeredSlides: true,
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            nextEl: ".banner-button-next",
            prevEl: ".banner-button-previous",
        },
    });
</script>