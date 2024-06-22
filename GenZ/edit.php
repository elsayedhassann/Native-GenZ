<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/edit.css">
  <link rel="icon shortcut" href="imgs/Genz_logo.ico" />
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Edit Profile</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
          <div class="nv">
            <div class="menu">
              <div ><i onclick="toggleDropdown()"><img src="IMGS/elsayed.png" alt="user" class="PicUser"></i>
                <div class="profile-dropdown">
                  <div class="dropdown" id="dropdown">
                    <a href="profile.htm" target="_blank">Dashboard</a>
                    <a href="Portfolio.html" target="_blank">About User</a>
                    <a href="edit.html" target="_blank">Edit Profile</a>
                    <a href="login_page.php">Logout</a>
                  </div>
                </div>
              </div>
              <ul class="nav-links">
                <li><a href="index.php" target="_blank"><img src="IMGS/Genz_logo.png" alt="home" class="logo-pic"></a></li>
                <li><a href="add_service.php">Add Service</a></li>
                <li><a href="find_one.html">find one</a></li>
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
      <form class="container" method="post" action="edit_handle.php" enctype="multipart/form-data">
        <img src="" alt="" id="ch-img">
        <input type="file" name="img">
        <label for="first_name">First name <input type="text" name="first_name"></label>
        <label for="last_name">Last name <input type="text" name="last_name"></label>
        <label for="status">status <input type="text" name="status"></label>
        <label for="information">informations <input type="text" name="information" ></label>
        <label for="password">password <input type="password" name="pw"></label>
        <label for="password_confirmation">password confirmation <input type="password" name="pc"></label>
        <input type="submit" value="Edit" class="button">
        
      </form>

        
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