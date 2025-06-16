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
                        <a href="events.php" class="nav-link active">Events</a>
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Events</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Events</span>
        </div>
    </div>
</section>

<?php
$object->query = "SELECT * FROM events WHERE event_date >= CURDATE()";

$object->execute();

if ($object->row_count() > 0) {
?>
    <!--Upcoming Events-->
    <section class="upcoming-events-2 py-5">
        <div class="container py-5 px-4 px-lg-5">
            <p
                class="text-green quicksand fw-bold text-center"
                style="font-size: 16px"
                id="reveal-up">
                <i class="fa-solid fa-angles-left me-2"></i> UPCOMING EVENTS
                <i class="fa-solid fa-angles-right ms-2"></i>
            </p>
            <h1
                class="quicksand fw-bold text-center my-4 mb-5"
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
    <hr class="mx-5">
<?php
}
?>

<!--Events-->
<section class="blog-news py-5">
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-green quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> OUR EVENTS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1
            class="quicksand fw-bold text-center my-4 mb-5"
            id="reveal-up">
            Explore Our Events
        </h1>
        <div class="row">
            <?php
            $object->query = "SELECT * FROM events WHERE event_date < CURDATE()";

            $object->execute();

            $result = $object->get_result();

            foreach ($result as $row) {
                echo '
                <div class="col-md-4 mb-4" id="reveal-left">
                    <div class="blog-item position-relative">
                        <div class="blog-image">
                            <img src="admin/' . $row["event_photo"] . '" class="img" />
                            <span class="event-date">' . date('d M Y', strtotime($row["event_date"])) . '</span>
                        </div>
                        <div class="blog-content d-flex flex-column justify-content-between" style="height: 300px;">
                            <div class="blog-desc">
                                <ul class="d-flex align-items-center text-gray">
                                    <li>
                                        <i class="fa-solid fa-location-dot me-2 text-green"></i>
                                        ' . $row["event_location"] . '
                                    </li>
                                    <li class="ms-4">
                                        <i class="fa-regular fa-clock me-2 text-green"></i> ' . date('H:i A', strtotime($row["event_start_time"])) . '
                                    </li>
                                </ul>
                                <h4 class="my-3">
                                    <a href="event-single.php?event_id=' . $row["event_id"] . '" class="quicksand text-decoration-none text-dark">' . $row["event_name"] . '</a>
                                </h4>
                                <p class="text-gray my-3" style="font-size: 14px">
                                    ' . $row["event_short_description"] . '
                                </p>
                            </div>
                            <a
                                href="event-single.php?event_id=' . $row["event_id"] . '"
                                class="text-decoration-none text-dark text-uppercase quicksand fw-bold">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
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