<?php
include('admin/main.php');
$object = new batch_details();
include 'header.php';

if (isset($_GET["event_id"])) {
    $_SESSION["event_id"] = $_GET["event_id"];
} else {
    echo "<script type='text/javascript'>window.location.href = 'events.php';</script>";
}

$object->query = "SELECT * FROM events WHERE event_id = '" . $_SESSION["event_id"] . "'";

$result = $object->get_result();

foreach ($result as $row) {
    $event_name = $row["event_name"];
    $event_introduction = $row["event_introduction"];
    $event_description = $row["event_description"];
    $event_location = $row["event_location"];
    $event_date = $row["event_date"];
    $event_start_time = $row["event_start_time"];
    $event_photo = $row["event_photo"];
    $location_map = $row["location_map"];
}
?>

<style>
    iframe {
        width: 100%;
        height: 400px !important;
        border: none;
    }
</style>

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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">
            <?php echo $event_name; ?>
        </h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <a href="events.php" class="text-white">Events</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green"><?php echo $event_name; ?></span>
        </div>
    </div>
</section>

<!--Events-->
<section class="event-details py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row g-5">
            <div class="col-md-8 mb-4">
                <div class="position-relative">
                    <div class="event-image">
                        <img src="img/1.jpg" class="img-fluid" />
                        <span class="blog-tag"><?php echo date("d m Y", strtotime($event_date)); ?></span>
                    </div>
                    <h2 class="quicksand fw-bold my-4">
                        <?php echo $event_name; ?>
                    </h2>
                    <ul
                        class="d-flex align-items-center text-gray m-0 p-0"
                        style="list-style: none">
                        <li class="quicksand">
                            <i class="fa-solid fa-location-dot me-2 text-green"></i>
                            <?php echo $event_location; ?>
                        </li>
                        <li class="ms-4 quicksand">
                            <i class="fa-solid fa-calendar-days me-2 text-green"></i> <?php echo date("d m Y", strtotime($event_date)); ?>
                        </li>
                        <li class="ms-4 quicksand">
                            <i class="fa-regular fa-clock me-2 text-green"></i> <?php echo $event_start_time; ?>
                        </li>
                    </ul>
                    <hr class="my-4" style="border-color: #a6a6a6" />
                    <p class="quicksand text-secondary mb-4 text-justify">
                        <?php echo $event_introduction; ?>
                    </p>
                    <p class="quicksand text-secondary text-justify">
                        <?php echo $event_description; ?>
                    </p>
                    <h2 class="quicksand fw-bold my-4">Requirements for the Event</h2>
                    <p class="quicksand text-secondary text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor
                        esse modi nostrum vero pariatur recusandae, fugit odit iste
                        nesciunt! Quos totam laborum odio eum fugit natus vero ab sed
                        sapiente dolores quia id accusantium fuga, porro numquam
                        consequuntur sit minus repellat, nesciunt expedita ullam
                        eveniet! Ullam laudantium distinctio, iure, asperiores nostrum
                        quia rerum reprehenderit natus molestias magnam
                    </p>
                    <div class="row my-4">
                        <?php
                        $object->query = "SELECT * FROM gallery WHERE event_id = '" . $_SESSION["event_id"] . "' LIMIT 2";
                        $result = $object->get_result();

                        $object->query = "SELECT * FROM gallery WHERE event_id = '" . $_SESSION["event_id"] . "'";
                        $object->execute();
                        $total = $object->row_count();

                        if ($total > 0) {
                            $i = 1;
                            foreach ($result as $row) {
                                if ($total > 2 && $i == 2) {
                                    echo '<div class="col-md-6 mb-lg-0 mb-4">
                                    <a href="admin/' . $row["photo_link"] . '" data-fancybox="gallery"><img src="admin/' . $row["photo_link"] . '" /></a>';

                                    $remainingQuery = "SELECT * FROM gallery WHERE event_id = '" . $_SESSION["event_id"] . "' LIMIT 2, " . ($total - 2);
                                    $object->query = $remainingQuery;
                                    $object->execute();
                                    $remainingResult = $object->get_result();
                                    foreach ($remainingResult as $remainingRow) {
                                        echo '<a href="admin/' . $remainingRow["photo_link"] . '" data-fancybox="gallery" class="position-absolute" style="top: 0; left: 0;"><img src="admin/' . $remainingRow["photo_link"] . '" style="visibility: hidden;" /></a>';
                                    }
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-6 mb-3">
                                    <a href="admin/' . $row["photo_link"] . '" data-fancybox="gallery"><img src="admin/' . $row["photo_link"] . '" /></a>
                                </div>';
                                }
                                $i++;
                            }
                        }
                        ?>
                    </div>
                    <p class="quicksand text-secondary text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor
                        esse modi nostrum vero pariatur recusandae, fugit odit iste
                        nesciunt! Quos totam laborum odio eum fugit natus vero ab sed
                        sapiente dolores quia id accusantium fuga, porro numquam
                        consequuntur sit minus repellat, nesciunt expedita ullam
                        eveniet! Ullam laudantium distinctio, iure, asperiores nostrum
                        quia rerum reprehenderit natus molestias magnam
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <!--Event Info Card-->
                <div class="event-info-card mb-4 p-4">
                    <h5 class="quicksand fw-bold">Event Info</h5>
                    <div class="event-info pt-3">
                        <div class="d-flex">
                            <div class="event-info-icon fs-5">
                                <i class="fa-solid fa-location-dot text-green"></i>
                            </div>
                            <div class="event-info-text">
                                <h6 class="quicksand fw-bold">Location</h6>
                                <p class="m-0 quicksand text-secondary"><?php echo $event_location; ?></p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="event-info-icon fs-5">
                                <i class="fa-solid fa-calendar-days text-green"></i>
                            </div>
                            <div class="event-info-text">
                                <h6 class="quicksand fw-bold">Date</h6>
                                <p class="m-0 quicksand text-secondary"><?php echo date("d m Y", strtotime($event_date)); ?></p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="event-info-icon fs-5">
                                <i class="fa-regular fa-clock text-green"></i>
                            </div>
                            <div class="event-info-text">
                                <h6 class="quicksand fw-bold">Time</h6>
                                <p class="m-0 quicksand text-secondary"><?php echo $event_start_time; ?></p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="event-info-icon fs-5">
                                <i class="fa-solid fa-users text-green"></i>
                            </div>
                            <div class="event-info-text">
                                <h6 class="quicksand fw-bold">Participants</h6>
                                <p class="m-0 quicksand text-secondary">50+</p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="event-info-icon fs-5">
                                <i class="fa-solid fa-money-bill text-green"></i>
                            </div>
                            <div class="event-info-text">
                                <h6 class="quicksand fw-bold">Cost</h6>
                                <p class="m-0 quicksand text-secondary">Free</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Location Map-->
                <?php echo $location_map; ?>
            </div>
        </div>
    </div>
</section>

<!--Events-->
<section class="blog-news">
    <div class="container pb-5 px-4 px-lg-5">
        <h2 class="quicksand fw-bold text-center mb-5" id="reveal-up">
            Our Events
        </h2>
        <div class="row">
            <div class="col-md-4 mb-4" id="reveal-left">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="event-date">22 Nov 2023</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-solid fa-location-dot me-2 text-green"></i>
                                Mirpur, Dhaka
                            </li>
                            <li class="ms-4">
                                <i class="fa-regular fa-clock me-2 text-green"></i> 09:00 AM
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <p class="text-gray my-3" style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a
                            href=""
                            class="text-decoration-none text-dark text-uppercase quicksand fw-bold">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" id="reveal-left">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="event-date">22 Nov 2023</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-solid fa-location-dot me-2 text-green"></i>
                                Mirpur, Dhaka
                            </li>
                            <li class="ms-4">
                                <i class="fa-regular fa-clock me-2 text-green"></i> 09:00 AM
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <p class="text-gray my-3" style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a
                            href=""
                            class="text-decoration-none text-dark text-uppercase quicksand fw-bold">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" id="reveal-left">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="event-date">22 Nov 2023</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-solid fa-location-dot me-2 text-green"></i>
                                Mirpur, Dhaka
                            </li>
                            <li class="ms-4">
                                <i class="fa-regular fa-clock me-2 text-green"></i> 09:00 AM
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <p class="text-gray my-3" style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a
                            href=""
                            class="text-decoration-none text-dark text-uppercase quicksand fw-bold">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    Fancybox.bind("[data-fancybox]", {});
</script>