<!--Footer-->
<footer>
    <div class="container py-5 px-4 px-lg-5">
        <div class="row pt-3">
            <div
                class="col-md-3 d-flex align-items-lg-start align-items-center flex-column mb-4"
                id="reveal-left">
                <img src="img/logo.png" width="180" />
                <p
                    class="mt-3 text-gray pe-4"
                    style="font-size: 15px; text-align: justify">
                    A non-profit charity organization conducted by the students of
                    different batches.
                </p>
                <a
                    href="donate.php"
                    class="custom-btn bg-green hover-dark-blue rounded my-3"
                    style="font-size: 13px">
                    DONATE NOW
                </a>
            </div>
            <div
                class="col-md-3 d-flex align-items-lg-start align-items-center flex-column mb-4"
                id="reveal-left">
                <div class="d-flex align-items-center">
                    <h5 class="text-white merriweather m-0 me-2">Quick Links</h5>
                </div>
                <div
                    class="links d-flex flex-column align-items-lg-start align-items-center mt-4">
                    <a href="events.php" class="text-gray"><i class="fa-solid fa-angles-right me-2"></i> Upcoming
                        Events</a>
                    <a href="about.php" class="text-gray mt-3"><i class="fa-solid fa-angles-right me-2"></i> About Us</a>
                    <a href="mission.php" class="text-gray mt-3"><i class="fa-solid fa-angles-right me-2"></i> Our Mission</a>
                    <a href="contact.php" class="text-gray mt-3"><i class="fa-solid fa-angles-right me-2"></i> Site Map</a>
                </div>
            </div>
            <div
                class="col-md-3 d-flex align-items-lg-start align-items-center flex-column mb-4"
                id="reveal-right">
                <div class="d-flex align-items-center">
                    <h5 class="text-white merriweather m-0 me-2">Visitor Count</h5>
                </div>
                <div
                    class="d-flex flex-column mt-4 align-items-lg-start align-items-center">
                    <!--total visitor total visitor today-->
                    <div class="d-flex">
                        <p class="text-gray">
                            Total Visitor:
                            <span class="counter text-yellow"></span>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="text-gray">
                            Today's Visitor:
                            <span class="counter text-yellow"></span>
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex align-items-lg-start align-items-center flex-column"
                id="reveal-right">
                <div class="d-flex align-items-center">
                    <h5 class="text-white merriweather m-0 me-2">Contact Us</h5>
                </div>
                <p class="text-gray mt-4" style="font-size: 15px">
                    Feel free to contact us!
                </p>
                <p class="text-gray" style="font-size: 15px">
                    <i class="fa-regular fa-envelope-open me-2 text-yellow"></i>
                    saveasmile.fd@gmail.com
                </p>
                <p class="text-gray" style="font-size: 15px">
                    <i class="fa-solid fa-phone-volume me-2 text-yellow"></i>
                    (+880)1865054501
                </p>
                <p class="text-gray" style="font-size: 15px">
                    Near the District Election Office,<br />Khagrachari Sadar,
                    Khagrachari
                </p>
            </div>
        </div>
    </div>
    <div
        class="text-center bg-dark text-white py-3"
        style="background-color: #292a2e">
        © All Copyright 2024 by Save A Smile Foundation
    </div>
</footer>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    let scrollPercentage = () => {
        let scrollProgress = document.getElementById("progress");
        let progressValue = document.getElementById("progress-value");
        let pos = document.documentElement.scrollTop;
        let calcHeight =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        let scrollValue = Math.round((pos * 100) / calcHeight);

        scrollProgress.style.background = `conic-gradient(#fcb900 ${scrollValue}%, #eeeeee ${scrollValue}%)`;
    };

    window.onscroll = function() {
        myFunction3();
        scrollPercentage();
    };
    window.onload = function() {
        myFunction3();
        scrollPercentage();
    };

    var navbar = document.getElementById("topbar");

    function myFunction3() {
        if (window.pageYOffset >= 500) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
<script>
    let menuBtn = document.getElementById("menu-btn");
    let nav = document.getElementById("nav");

    menuBtn.addEventListener("click", () => {
        nav.style.display = nav.style.display === "block" ? "none" : "block";
    });
</script>

<script>
    ScrollReveal({
        reset: true,
        distance: "50px",
        duration: 2000,
        delay: 200,
    });

    ScrollReveal().reveal("#reveal-left", {
        delay: 200,
        origin: "left",
    });

    ScrollReveal().reveal("#reveal-right", {
        delay: 200,
        origin: "right",
    });

    ScrollReveal().reveal("#reveal-up", {
        delay: 200,
        origin: "top",
    });

    ScrollReveal().reveal("#reveal-down", {
        delay: 200,
        origin: "bottom",
    });

    ScrollReveal().reveal("#reveal-left-2", {
        delay: 400,
        origin: "left",
    });

    ScrollReveal().reveal("#reveal-left-3", {
        delay: 600,
        origin: "left",
    });

    ScrollReveal().reveal("#reveal-right-2", {
        delay: 400,
        origin: "right",
    });

    ScrollReveal().reveal("#reveal-right-3", {
        delay: 600,
        origin: "right",
    });

    ScrollReveal().reveal("#reveal-up-2", {
        delay: 400,
        origin: "top",
    });

    ScrollReveal().reveal("#reveal-down-2", {
        delay: 400,
        origin: "bottom",
    });
</script>

</html>