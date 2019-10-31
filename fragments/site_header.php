<div class="container">
    <header id="header">
        <!--Logo-->
        <section id="logo">
            <a href="index.php"><img id="hng-logo"
                    src="https://res.cloudinary.com/phiileo/image/upload/v1571147073/brand-logo_tx0mdt.png"></a>
        </section>
        <!--ends here-->
        <section class="nav_button" onclick="toggleMenu()">
            <div class="nav_button_bar"></div>
            <div class="nav_button_bar"></div>
            <div class="nav_button_bar"></div>
        </section>
        <nav class="menu_bar" id="navMenu">
            <a href="index.php" class="nav-link" id="home">Home</a>
            <a href="hng6.php" class="nav-link">HNGi 6.0</a>
            <a href="mentorpage.php" class="nav-link">Mentors</a>
            <a href="contactform.php" class="nav-link">Contact</a>
            <a href="login.php" class="nav-link">Login</a>
            <a href="join-intern.php" class="nav-link primary-btn float_right">Join HNGi7.0</a>
        </nav>
    </header>
</div>

<script>
    function toggleMenu(){
        let menuBar = $("#navMenu");
        menuBar.toggle();
    }



    function grabHeight() {
        var D = document;
        return Math.max(
            D.body.scrollHeight, D.documentElement.scrollHeight,
            D.body.offsetHeight, D.documentElement.offsetHeight,
            D.body.clientHeight, D.documentElement.clientHeight
        )
    }

    let prev = 0;
    function mainfunc() {
        //prev = pctScrolled;
        var winheight = window.innerHeight || (document.documentElement || document.body).clientHeight;
        var docheight = grabHeight();
        var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
        var trackLength = docheight - winheight;
        var pctScrolled = scrollTop / trackLength * 100;

        if (scrollTop > prev) {
            document.getElementById("header").classList.add("navbg2");
            document.getElementById("header").classList.remove("navbg");
            document.getElementById("header").classList.remove("dynamic");

        } else {

            document.getElementById("header").classList.add("navbg");
            document.getElementById("header").classList.remove("navbg2");
            document.getElementById("header").classList.add("dynamic");

        }
        if (pctScrolled < 0.3) {
            document.getElementById("header").classList.add("navbg2");
            document.getElementById("header").classList.remove("navbg");
            document.getElementById("header").classList.remove("dynamic");

        }

        return prev = scrollTop <= 0 ? 0 : scrollTop;


    }
    window.addEventListener("scroll", function () {
        mainfunc();

    });

   
</script>
