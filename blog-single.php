<?php
include('admin/main.php');
$object = new batch_details();
include 'header.php';

if (isset($_GET["news_id"])) {
    $_SESSION["news_id"] = $_GET["news_id"];
} else {
    echo "<script type='text/javascript'>window.location.href = 'blogs.php';</script>";
}

function getCategoryString($binaryString)
{
    $categories = [
        'Donation',
        'Charity',
        'Medical'
    ];

    $selectedCategories = [];

    for ($i = 0; $i < strlen($binaryString); $i++) {
        if ($binaryString[$i] == '1') {
            $selectedCategories[] = $categories[$i];
        }
    }

    return implode(', ', $selectedCategories);
}

$object->query = "SELECT fill_form.firstname, fill_form.lastname, news.* FROM news INNER JOIN fill_form ON fill_form.form_id = news.created_by WHERE news_id = '" . $_SESSION["news_id"] . "'";

$result = $object->get_result();

foreach ($result as $row) {
    $news_title = $row["news_title"];
    $news_content = $row["news_content"];
    $news_photo_link = $row["news_photo_link"];
    $news_date = $row["news_date"];
    $category = $row["category"];
    $fullname = $row["firstname"] . " " . $row["lastname"];
    $category = getCategoryString($row["category"]);
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">
            <?php echo $news_title; ?>
        </h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <a href="blogs.php" class="text-white">Blogs</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green"><?php echo $news_title; ?></span>
        </div>
    </div>
</section>

<!--Events-->
<section class="event-details py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row g-5">
            <div class="col-md-8 mb-4">
                <div class="position-relative mb-5">
                    <div class="event-image">
                        <img src="admin/<?php echo $news_photo_link; ?>" class="img-fluid" />
                        <span class="blog-tag"><?php echo $category; ?></span>
                    </div>
                    <h2 class="quicksand fw-bold my-4">
                        <?php echo $news_title; ?>
                    </h2>
                    <ul
                        class="d-flex align-items-center text-gray m-0 p-0"
                        style="list-style: none">
                        <li class="quicksand">
                            <i class="fa-regular fa-user me-2 text-green"></i> By <?php echo $fullname; ?>
                        </li>
                        <li class="ms-4 quicksand">
                            <i class="fa-regular fa-clock me-2 text-green"></i> <?php echo date("d M Y", strtotime($news_date)); ?>
                        </li>
                    </ul>
                    <hr class="my-4" style="border-color: #a6a6a6" />
                    <p class="quicksand text-secondary mb-4 text-justify">
                        <?php echo $news_content; ?>
                    </p>
                    <div class="row my-4">
                        <?php
                        $object->query = "SELECT * FROM gallery WHERE event_id = '" . $_SESSION["news_id"] . "' LIMIT 2";
                        $result = $object->get_result();

                        $object->query = "SELECT * FROM gallery WHERE event_id = '" . $_SESSION["news_id"] . "'";
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
                </div>
                <hr class="my-3" style="border-color: #a6a6a6" />
                <div
                    class="d-flex justify-content-lg-between justify-content-start align-items-center">
                    <div class="d-flex tag-share align-items-center">
                        <strong>Tags:</strong>
                        <div class="tags">
                            <a href="#">Save Water</a>
                            <a href="#">Kids</a>
                            <a href="#">Education</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <strong>Share:</strong>
                        <a href="#" class="text-dark ms-3"><i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-dark ms-3"><i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-dark ms-3"><i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <hr class="my-3" style="border-color: #a6a6a6" />
            </div>
            <div class="col-md-4">
                <div class="event-info-card mb-4 p-4">
                    <h5 class="quicksand fw-bold">Search</h5>
                    <div class="search-bar position-relative">
                        <form action="blogs.php" method="GET">
                            <input
                                type="text"
                                class="custom-form-control mt-3"
                                placeholder="Search here"
                                name="q" />
                            <button class="search-btn" type="submit">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="event-info-card mb-4 p-4">
                    <h5 class="quicksand fw-bold">Category</h5>
                    <ul class="blog-category mt-3">
                        <li id="reveal-up">
                            <a href="#" class="text-dark fw-bold quicksand">Education</a>
                            <span class="text-secondary quicksand">(2)</span>
                        </li>
                        <li id="reveal-up">
                            <a href="#" class="text-dark fw-bold quicksand">Medical & Health</a>
                            <span class="text-secondary quicksand">(5)</span>
                        </li>
                        <li id="reveal-up">
                            <a href="#" class="text-dark fw-bold quicksand">Donation</a>
                            <span class="text-secondary quicksand">(3)</span>
                        </li>
                        <li id="reveal-up">
                            <a href="#" class="text-dark fw-bold quicksand">Water and Foods</a>
                            <span class="text-secondary quicksand">(6)</span>
                        </li>
                    </ul>
                </div>
                <!--Event Info Card-->
                <div class="event-info-card mb-4 p-4">
                    <h5 class="quicksand fw-bold">Recent Posts</h5>
                    <?php
                    $object->query = "SELECT * FROM news ORDER BY news_date DESC LIMIT 3";

                    $result = $object->get_result();

                    foreach ($result as $row) {
                        echo '<div class="event-info pt-3" id="reveal-right">
                        <div class="d-flex">
                            <img src="admin/' . $row["news_photo_link"] . '" class="img-fluid blog-info-icon me-3" />
                            <div class="event-info-text">
                                <h6>
                                    <a
                                        href="blog-single.php?news_id=' . $row["news_id"] . '"
                                        class="quicksand text-dark hover-text-green fw-bold text-decoration-none"
                                        style="line-height: 20px">' . $row["news_title"] . '
                                    </a>
                                </h6>
                                <p
                                    class="m-0 quicksand text-secondary"
                                    style="font-size: 14px">
                                    ' . date("d M Y", strtotime($row["news_date"])) . '
                                </p>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>

                <div class="event-info-card mb-4 p-4">
                    <h5 class="quicksand fw-bold">Tags</h5>
                    <div class="tags pt-3">
                        <a href="#">Save Water</a>
                        <a href="#">Kids</a>
                        <a href="#">Education</a>
                        <a href="#">Health</a>
                        <a href="#">Food</a>
                        <a href="#">Cloth</a>
                        <a href="#">Shelter</a>
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