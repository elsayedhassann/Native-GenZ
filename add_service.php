<?php
require_once('header.php');
?>
<link rel="stylesheet" href="CSS\add_service.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
        <input type="number" name="price" placeholder="Add price">
        <small style="color: red; font-size: 10px;">by dollar$</small>
       </div>
       <input type="hidden" name="user_id" id="<?=$user->user_id?>">
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