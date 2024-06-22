<?php
session_start();
require_once('classes.php');
$user= unserialize($_SESSION["user"]);
$myprojects= $user->my_projects($user->user_id);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon shortcut" href="imgs/Genz_logo.ico" />
<link rel="stylesheet" href="CSS\add_service.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=2, initial-scale=1.0">
    <title>Add Service</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
          <div class="nv">
            <div class="menu">
              <div><i onclick="toggleDropdown()"><img src="IMGS/elsayed.png" alt="user" class="PicUser"></i>
                <div class="profile-dropdown">
                  <div class="dropdown" id="dropdown">
                    <a href="profile.htm" target="_blank">Profile</a>
                    <a href="Portfolio.html" target="_blank">About User</a>
                    <a href="login_page.html">Logout</a>
                  </div>
                </div>
              </div>
              <ul class="nav-links">
                <li><a href="index.php" target="_blank"><img src="IMGS/Genz_logo.png" alt="home" class="logo-pic"></a></li>
                <li><a href="#">Add Service</a></li>
                <li><a href="#">Available Job</a></li>
                <li><a href="login_page.html" target="_blank">Sign in</a></li>
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
      <form class="container" action="add_service_handle.php" method="post">
        <h1>Add Project</h1>
        <hr>
        <div class="sub-container">
                <label for="depart" >Depart: </label>
         <select name="depart" id="depart" multiple class="depart" >
            <option value="programming">programming</option>
            <option value="data entry">data entry</option>
            <option value="wordpress">wordpress</option>
            <option value="artificial intelligence">artificial intelligence</option>
            <option value="engineering">engineering</option>
            <option value="gym">gym</option>
            <option value="learning">learning</option>
            <option value="photoshop">photoshop</option>
            <option value="transelate">transelate</option>
            <option value="voices">voices</option>
            <option value="another Service">another Service</option>
         </select>
            </div>
            <div class="sub-container">
                <label for="title">project title:</label>
                <input type="text" name="title" placeholder="Add title">
        </div>
       <div class="sub-container">
        <label for="add Describe">Add Describe:</label>
           <textarea name="describe" id="describe" placeholder="Add descripe" cols="100" rows="10"></textarea>
       </div>
       <div class="sub-container">
        <label for="Experince required">Experince required:</label>
        <input type="text" name="experince" placeholder="Add Skills you need">
       </div>
       <div class="sub-container">
        <label for="Price">Price:</label>
        <input type="text" name="price" placeholder="Add price">
        <small style="color: red; font-size: 10px;">by dollar$</small>
       </div>
       <input type="submit" value="ADD" class="button" >
</form>
    <p id="ded" class="txt">@Developed by GenZ Team ^_^</p>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('depart');
    </script>
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