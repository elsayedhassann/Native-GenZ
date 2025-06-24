<link rel="stylesheet" href="assets/CSS/edit.css">
<?php
require_once('header.php');
?>

<div class="mainCont">
  <form class="container" method="post" action="edit_handle.php" enctype="multipart/form-data">
  <img src="<?php if (!empty($user->img)) echo $user->img;
            else echo "IMGS/userico.png" ?>"id="ch-img">
  <input type="file" name="image">
  <label for="first_name">First name <input type="text" name="first_name"></label>
  <label for="last_name">Last name <input type="text" name="last_name"></label>
  <label for="status">Status <input type="text" name="status"></label>
  <label for="information">Informations <input type="text" name="information"></label>
  <label for="password">Password <input type="password" name="pw"></label>
  <label for="password_confirmation">Password Confirmation <input type="password" name="pc"></label>
  <button type="submit" class="btn btn-primary">save</button>
</form>

</div>

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