<?php
include('admin/main.php');
$object = new batch_details();
include 'header.php';

if (isset($_GET["project_id"])) {
    $_SESSION["project_id"] = $_GET["project_id"];
} else {
    echo "<script type='text/javascript'>window.location.href = 'projects.php';</script>";
}

$object->query = "SELECT * FROM projects WHERE project_id = '" . $_SESSION["project_id"] . "'";

$result = $object->get_result();

foreach ($result as $row) {
    $project_title = $row["project_title"];
    $project_description = $row["project_description"];
    $project_category = $row["project_category"];
    $project_location = $row["project_location"];
    $project_target_people = $row["project_target_people"];
    $project_photo = $row["project_photo"];
    $project_duration = $row["project_duration"];
    $project_theme_color = $row["project_theme_color"];
}
?>

<style>
    :root {
        --primary-color: <?php echo $project_theme_color; ?>;
    }

    .theme-text {
        color: var(--primary-color);
    }

    .theme-bg {
        background-color: var(--primary-color);
    }

    .theme-hover:hover {
        color: var(--primary-color);
    }

    .nav-pills .nav-link.active {
        background-color: var(--primary-color);
        color: white;
    }

    .accordion .accordion-item h2 button::before {
        background-color: var(--primary-color);
    }

    .accordion .accordion-item h2 button.collapsed::before {
        color: var(--primary-color);
    }

    .theme-border {
        border-color: var(--primary-color);
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up"><?php echo $project_title; ?></h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <a href="projects.php" class="text-white">Projects</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="theme-text"><?php echo $project_title; ?></span>
        </div>
    </div>
</section>

<!--Project Single-->
<section class="project-single">
    <div class="container px-4 px-lg-5 py-5">
        <div class="swiper mySwiper" id="projectslider">
            <div class="swiper-wrapper">
                <?php
                $object->query = "SELECT * FROM project_gallery WHERE show_in_slider = '1'";

                $result = $object->get_result();

                foreach ($result as $row) {
                    echo '
                    <div class="swiper-slide position-relative">
                        <div class="banner" style="background-image: url(\'admin/' . $row["photo_link"] . '\');"></div>
                    </div>
                ';
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="row project-single-content mx-0">
            <div class="col-md-3 mb-lg-0 mb-3">
                <div class="d-flex">
                    <div
                        class="project-icon theme-bg d-flex justify-content-center align-items-center p-3 me-3">
                        <img src="img/icons8-charity-box-100.png" />
                    </div>
                    <div class="mission-text">
                        <h5 class="quicksand fw-bold">Project Time</h5>
                        <p class="quicksand text-secondary mb-0" style="font-size: 14px"><?php echo $project_duration; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-lg-0 mb-3">
                <div class="d-flex">
                    <div
                        class="project-icon theme-bg d-flex justify-content-center align-items-center p-3 me-3">
                        <img src="img/icons8-label-100.png" />
                    </div>
                    <div class="mission-text">
                        <h5 class="quicksand fw-bold">Category</h5>
                        <p class="quicksand text-secondary mb-0" style="font-size: 14px"><?php echo $project_category; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-lg-0 mb-3">
                <div class="d-flex">
                    <div
                        class="project-icon theme-bg d-flex justify-content-center align-items-center p-3 me-3">
                        <img src="img/icons8-marker-100.png" />
                    </div>
                    <div class="mission-text">
                        <h5 class="quicksand fw-bold">Location</h5>
                        <p class="quicksand text-secondary mb-0" style="font-size: 14px"><?php echo $project_location; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex">
                    <div
                        class="project-icon theme-bg d-flex justify-content-center align-items-center p-3 me-3">
                        <img src="img/icons8-user-groups-100.png" />
                    </div>
                    <div class="mission-text">
                        <h5 class="quicksand fw-bold">Target People</h5>
                        <p class="quicksand text-secondary mb-0" style="font-size: 14px"><?php echo $project_target_people; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active theme-hover" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Project Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link theme-hover" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Committee</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link theme-hover" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Activities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link theme-hover" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Budget</button>
            </li>
        </ul>
        <hr class="border-secondary">
        <div class="tab-content" id="pills-tab">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h2 class="quicksand fw-bold my-4">
                    <?php echo $project_title; ?>
                </h2>
                <p class="quicksand mb-4" style="text-align: justify;">
                    <?php echo $project_description; ?>
                </p>
                <h2 class="quicksand fw-bold my-4">
                    Project Activities
                </h2>
                <div class="accordion p-0" id="accordionExample">
                    <?php
                    $object->query = "SELECT * FROM activities WHERE project_id = '" . $_SESSION["project_id"] . "'";

                    $result = $object->get_result();

                    $i = 1;

                    foreach ($result as $row) {
                        $isFirst = $i === 1;
                        $activity_image = '';
                        if ($row["activity_image"] != '') {
                            $activity_image = '<img src="admin/' . $row["activity_image"] . '" class="ms-lg-4 ms-0 mb-4"/>';
                        }
                        echo '
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button' . ($isFirst ? '' : ' collapsed') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $i . '" aria-expanded="' . ($isFirst ? 'true' : 'false') . '" aria-controls="collapse' . $i . '">
                                    <i class="fa-regular fa-circle-check me-2 theme-text"></i> ' . $row["activity_name"] . '
                                </button>
                            </h2>
                            <div id="collapse' . $i . '" class="accordion-collapse collapse' . ($isFirst ? ' show' : '') . '" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    ' . $activity_image . '
                                    ' . $row["activity_details"] . '
                                </div>
                            </div>
                        </div>
                        ';
                        $i++;
                    }
                    ?>
                </div>
                <div class="row my-5">
                    <div class="col-md-5">
                        <h2 class="quicksand fw-bold mb-4">The Installation Challenge</h2>
                        <p class="my-4 quicksand text-secondary">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat,
                            veniam?
                        </p>
                        <div class="row about-us">
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
                                    <li class="mb-4">
                                        <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                        Support
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
                                    <li class="mb-4">
                                        <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                        Support
                                    </li>
                                    <li class="mb-4">
                                        <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                        Support
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="img/2.jpg" class="img-fluid" />
                            </div>
                            <div class="col-md-6">
                                <img src="img/2.jpg" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
                <p class="quicksand text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor esse
                    modi nostrum vero pariatur recusandae, fugit odit iste nesciunt! Quos
                    totam laborum odio eum fugit natus vero ab sed sapiente dolores quia
                    id accusantium fuga, porro numquam consequuntur sit minus repellat,
                    nesciunt expedita ullam eveniet! Ullam laudantium distinctio, iure,
                    asperiores nostrum quia rerum reprehenderit natus molestias magnam
                </p>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h1 class="quicksand fw-bold my-5 text-center theme-text">
                    Meet The Team
                </h1>
                <div class="row">
                    <?php
                    $object->query = "SELECT * FROM project_external WHERE project_id = '" . $_SESSION["project_id"] . "'";

                    $result = $object->get_result();

                    foreach ($result as $row) {
                        echo '
                        <div class="col-md-3 mb-4">
                            <div class="committee d-flex align-items-center flex-column">
                                <img src="admin/' . $row["p_ex_photo"] . '" class="img-fluid theme-border">
                                <div class="member-name theme-bg">' . $row["p_ex_name"] . '</div>
                                <div class="member-rank">' . $row["p_ex_rank"] . '</div>
                            </div>
                        </div>
                        ';
                    }

                    $object->query = "SELECT fill_form.firstname, fill_form.lastname, fill_form.photo, project_committee.committee_rank FROM fill_form INNER JOIN project_committee ON fill_form.form_id = project_committee.form_id WHERE project_committee.project_id = '" . $_SESSION["project_id"] . "'";

                    $result = $object->get_result();

                    foreach ($result as $row) {
                        echo '
                        <div class="col-md-3 mb-4">
                            <div class="committee d-flex align-items-center flex-column">
                                <img src="admin/' . $row["photo"] . '" class="img-fluid theme-border">
                                <div class="member-name theme-bg">' . $row["firstname"] . ' ' . $row["lastname"] . '</div>
                                <div class="member-rank">' . $row["committee_rank"] . '</div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <h1 class="quicksand fw-bold my-5 text-center theme-text">
                    Activity Tracking
                </h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>School Name</th>
                                <th>Date</th>
                                <th>Activity Type</th>
                                <th>Supplies Provided</th>
                                <th>Feedback/Outcomes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Khagrachari Noy Mile Junior High School</td>
                                <td>May 25, 2024</td>
                                <td>Seminar on Menstrual Health</td>
                                <td>80 Pads</td>
                                <td>Girls showed high interest; teachers requested future sessions</td>
                            </tr>
                            <tr>
                                <td>Munigram High School</td>
                                <td>July 4, 2024</td>
                                <td>Seminar on Menstrual Health</td>
                                <td>-</td>
                                <td>Girls showed high interest</td>
                            </tr>
                            <tr>
                                <td>Munigram High School</td>
                                <td>July 5, 2024</td>
                                <td>Menstrual Hygiene Corner Setup</td>
                                <td>Initial stock of 192 pads</td>
                                <td>Positive response; teachers noted increased awareness among students</td>
                            </tr>
                            <tr>
                                <td>Munigram High School</td>
                                <td>September 1, 2024</td>
                                <td>Sanitary Pad Supply</td>
                                <td>192 pads</td>
                                <td>Increased demand noted; family attitudes remain mixed but improving</td>
                            </tr>
                            <tr>
                                <td>Munigram High School</td>
                                <td>November 14, 2024</td>
                                <td>Sanitary Pad Supply</td>
                                <td>180 pads</td>
                                <td>Increased demand noted; Highly Positive Response</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                <h1 class="quicksand fw-bold mt-5 mb-4 text-center theme-text">
                    Budget and Expenses
                </h1>
                <p class="quicksand mb-4">
                    Primarily funded by the Save a Smile Foundation with additional support through one-time donations from well-wishers.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Item</th>
                                <th>Description</th>
                                <th>Unit Cost (BDT)</th>
                                <th>Quantity</th>
                                <th>Total Cost (BDT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sanitary Pads</td>
                                <td>Cost per pad</td>
                                <td>3</td>
                                <td>1000</td>
                                <td>3,000</td>
                            </tr>
                            <tr>
                                <td>Seminar Materials</td>
                                <td>Printed brochures, posters</td>
                                <td>-</td>
                                <td>-</td>
                                <td>3,000</td>
                            </tr>
                            <tr>
                                <td>Transportation</td>
                                <td>Travel costs for team</td>
                                <td>-</td>
                                <td>-</td>
                                <td>5,000</td>
                            </tr>
                            <tr>
                                <td>Menstrual Hygiene Corner</td>
                                <td>Set up per school</td>
                                <td>2,000</td>
                                <td>5</td>
                                <td>10,000</td>
                            </tr>
                            <tr>
                                <td>Miscellaneous</td>
                                <td>Additional costs</td>
                                <td>-</td>
                                <td>-</td>
                                <td>5,000</td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Total Estimated Cost</strong></td>
                                <td><strong>26,000 BDT</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>

<?php
include 'footer.php';
?>

<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>