<?php
session_start();
require_once('classes.php');
$user= unserialize($_SESSION["user"]);
$myprojects= $user->my_projects($user->user_id);
var_dump($myprojects);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/find_one.css" />
    <link rel="icon shortcut" href="imgs/Genz_logo.ico" />
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Find One</title>
  </head>
  <body>
    <nav>
      <div class="nav-bar">
        <div class="nv">
          <div class="menu">
            <div>
              <i onclick="toggleDropdown()"
                ><img src="IMGS/elsayed.png" alt="user" class="PicUser"
              /></i>
              <div class="profile-dropdown">
                <div class="dropdown" id="dropdown">
                  <a href="profile.htm" target="_blank">Dashboard</a>
                  <a href="Portfolio.html" target="_blank">About User</a>
                  <a href="login_page.php">Logout</a>
                </div>
              </div>
            </div>
            <ul class="nav-links">
              <li>
                <a href="index.php" target="_blank"
                  ><img src="IMGS/Genz_logo.png" alt="home" class="logo-pic"
                /></a>
              </li>
              <li><a href="add_service.php">Add Service</a></li>
              <li><a href="#">find one</a></li>
              <li><a href="login_page.php" target="_blank">Sign in</a></li>
              <div class="darkLight-searchBox">
                <div class="dark-light">
                  <i class="bx bx-moon moon"></i>
                  <i class="bx bx-sun sun"></i>
                </div>
                <div class="searchBox">
                  <div class="searchToggle">
                    <i class="bx bx-x cancel"></i>
                    <i class="bx bx-search search"></i>
                  </div>
                  <div class="search-field">
                    <input type="text" placeholder="Search..." />
                    <i class="bx bx-search"></i>
                  </div>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <h1>Available...</h1>
      <hr/>
      <div class="card">
        <form action="comment.html" method="get">
          <div class="label">
            <label for="title">title </label>
            <div class="sub">
              <p><i class="bx bx-user user"></i>user name </p>
              <p><i class="bx bx-time time"></i>from time</p>
              <p><i class="bx bx-error error"></i>Depart</p>
            </div>
          </div>
          <input type="submit" value="comment" id="button" />
        </form>
        <p class="content">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus ducimus non nobis consectetur aspernatur, saepe eaque obcaecati nihil necessitatibus itaque!
        </p>
      </div>
    </div>
<?php
foreach($myprojects as $project){
  var_dump($myprojects);
?>
      <div class="card">
        <form action="comment.html" method="get">
          <div class="label">
            <label for="title"><?= $projects["title"]?> </label>
            <div class="sub">
              <p><i class="bx bx-user user"></i><?= $user->first_name?> <?= $user->last_name?></p>
              <p><i class="bx bx-time time"></i>from <?= $projects["created_at"]?></p>
              <p><i class="bx bx-error error"></i>Depart <?= $projects["depart"]?></p>
            </div>
          </div>
          <input type="submit" value="comment" id="button" />
        </form>
        <p class="content">
        <?= $projects["descripe"]?>
        </p>
      </div>
    </div>
<?php
}
?>

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
      body.addEventListener("click", (e) => {
        let clickedElm = e.target;
        if (
          !clickedElm.classList.contains("sidebarOpen") &&
          !clickedElm.classList.contains("menu")
        ) {
          nav.classList.remove("active");
        }
      });
    </script>
    <p id="ded" class="txt">@Developed by GenZ Team ^_^</p>

  </body>
</html>
