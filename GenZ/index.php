<?php
session_start();
require_once('classes.php');
  $user= unserialize($_SESSION["user"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon shortcut" href="imgs/Genz_logo.ico" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>GenZ</title>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <div class="nv">
                <div class="menu">
                    <div><i onclick="toggleDropdown()"><img src="IMGS/elsayed.png" alt="user" class="PicUser"></i>
                        <div class="profile-dropdown">
                            <div class="dropdown" id="dropdown">
                                <a href="profile.htm" target="_blank">Dashboard</a>
                                <a href="Portfolio.php" target="_blank">About User</a>
                                <a href="edit.php" target="_blank">Edit Profile</a>
                                <a href="logout_handle.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <ul class="nav-links">
                        <li><a href="index.php" target="_blank"><img src="IMGS/Genz_logo.png" alt="home"
                                    class="logo-pic"></a></li>
                        <li><a href="add_service.php">Add Service</a></li>
                        <li><a href="find_one.php">find one</a></li>
                        <li><a href="login_page.php" target="_blank">Sign in</a></li>
                        <div class="darkLight-searchBox">
                            <div class="dark-light">
                                <i class='bx bx-moon moon'></i>
                                <i class='bx bx-sun sun'></i>
                            </div>
                            <div class="searchBox">
                                <div class="searchToggle">
                                    <i class='bx bx-x cancel'></i>
                                    <i class='bx bx-search search'></i>
                                </div>
                                <div class="search-field">
                                    <input type="text" placeholder="Search...">
                                    <i class='bx bx-search'></i>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="logo1">
        <span href="#" class="text1">Welcome <?= $user->first_name ?> to GenZ<img src="IMGS/Genz_logo.png" alt="Profile"
                class="logo-pic"></a>
    </div>
    <span class="text_main">All professional services to develop your business</span>
    <div class="card-container">
        <div class="card">
            <a href="#">
                <h2>Programming</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/programming.avif" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>data entry</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/dataentry.jpg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>WordPress</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/WordPress.png" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>artificial intelligence</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/ai.jpeg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>engineering</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/engineering.jpg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>gym</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/gym.jpg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>learning</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/learning.jpeg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>photoshop</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/photoshop.jpg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>transelate</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/transelate.png" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>voices</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/voices.jpg" alt=""></a>
        </div>
        <div class="card">
            <a href="#">
                <h2>another Service</h2>
            </a>
            <p>This is some content for card 1. Lorem ipsum dolor sit amet...</p>
            <a href="#"><img src="IMGS/؟.jpg" alt=""></a>
        </div>

    </div>
    <div class="secound">
        <div class="secound_part1"> <img src="IMGS/Genz_logo.png" alt="logo" class="logo-pic">
            <h2>How do you benefit from GenZ?</h2>
        </div>
        <div class="secound_part2">
            <table>
                <tr>
                    <td>Find best price</td>
                    <td>Find best empolyee for your projects</td>
                </tr>
                <tr>
                    <td>Explore projects</td>
                    <td>Dealing with high reliability</td>
                </tr>
                <tr>
                    <td>New ideas</td>
                    <td>Find help in your projects</td>
                </tr>
                <tr>
                    <td>Hire empolyees</td>
                    <td>Best place for jobseeker</td>
                </tr>
                <tr>
                    <td>Sharing informations</td>
                    <td>More and more...</td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
        <marquee slow-motion=6 direction="right">WHO WE ARE?</marquee>
        <hr color="#f5650e">
        <div class="table">
            <p>we are GenZ team and it's our project for WEB2</p>
            <table class="members" border="2px">
                <tr>
                    <td colspan="2">genZ Members</td>
                </tr>
                <tr>
                    <td>elsayed hassan elsayed ismail</td>
                    <td>2220080</td>
                </tr>
                <tr>
                    <td>ashraf osama mahmoud hamed</td>
                    <td>2220076</td>
                </tr>
                <tr>
                    <td>adham kamel mohamed kamel</td>
                    <td>2220059</td>
                </tr>
                <tr>
                    <td>youssef mohamed ahmed abd-elaziz</td>
                    <td>2220534</td>
                </tr>
                <tr>
                    <td>abd-elrahman tarek abd-elaziz ali</td>
                    <td>2220246</td>
                </tr>
                <tr>
                    <td>mostafa hassan mohamed ahmed</td>
                    <td>2220471</td>
                </tr>
                <tr>
                    <td>mohamed yahya ebrahim abo-elmagd</td>
                    <td>2220425</td>
                </tr>
                <tr>
                    <td>hassan elsayed hassan elsayed</td>
                    <td>2220141</td>
                </tr>
                <tr>
                    <td>muhaned mohamed mahmoud awad</td>
                    <td>2221310</td>
                </tr>
                <tr>
                    <td>ahmed hassan ali mohamed</td>
                    <td>2220018</td>
                </tr>
            </table>
        </div>
        <p>and we are from borg alarab technological university</p>
        <p class="batu">BATU</p>
    </footer>
    <p id="ded" class="txt">@Developed by GenZ Team ^_^</p>


    <script>
    const body = document.querySelector("body"),
        nav = document.querySelector("nav"),
        modeToggle = document.querySelector(".dark-light"),
        searchToggle = document.querySelector(".searchToggle"),
        sidebarOpen = document.querySelector(".sidebarOpen"),
        sidebarClose = document.querySelector(".sidebarClose");
    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark-mode") {
        body.classList.add("dark");
    }
    // js code to toggle dark and light mode
    modeToggle.addEventListener("click", () => {
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if (!body.classList.contains("dark")) {
            localStorage.setItem("mode", "light-mode");
        } else {
            localStorage.setItem("mode", "dark-mode");
        }
    });
    // js code to toggle search box
    searchToggle.addEventListener("click", () => {
        searchToggle.classList.toggle("active");
    });

    // js code to toggle profile dropdown
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.classList.toggle("active");
    }

    //   js code to toggle sidebar
    sidebarOpen.addEventListener("click", () => {
        nav.classList.add("active");
    });
    sidebarClose.addEventListener("click", () => {
        nav.classList.remove("active");
    });
    body.addEventListener("click", e => {
        let clickedElm = e.target;
        if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
            nav.classList.remove("active");
        }
    });
    </script>

</body>

</html>