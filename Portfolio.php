<link rel="stylesheet" href="CSS/portfolio.css">
<?php
require_once('header.php');
$myproject = $user->my_projects($user->user_id);
?>
<div class="contianer">
  <div>
    <img src="<?php if (!empty($user->img)) echo $user->img;
              else echo "IMGS/userico.png" ?>" alt="Mine" class="photo" />
  </div>
  <div class="word">
    <span class="txt">Hi, I'm</span>
    <h2 class="fristname"><?= $user->first_name ?></h2>
    <h2 class="txt"> <?= $user->last_name ?></h2>
    <span class="txt"><?= $user->status ?></span>
    <p class="txt"><?= $user->information ?>
      <hr>
  </div>
</div>
<?php
  foreach ($myproject as $project) {
  ?>
    <div class="scard">
      <div class="label">
        <h2 for="title" style="text-align: center;text-transform: capitalize;"><?= $project["title"] ?> </h2>
        <p class="content">
          <div class="doublesub">
            <p class="image-name"><img src="<?php if (!empty($user->img)) echo $user->img;
                          else echo "IMGS/userico.png" ?>" class="PicUser2"><?= $user->first_name ?> <?= $user->last_name ?></p>
            <p><i class="bx bxl-codepen "></i>Depart <?= $project["depart"] ?></p>
            <p><i class="bx bx-money"></i>Price <?= $project["price"] ?></p>
            <p><i class="bx bx-layer"></i>Experince <?= $project["experince"] ?></p>
            <p><i class="bx bx-time time"></i>from <?= $project["created_at"] ?></p>
          </div>
          <?= $project["descripe"] ?>
        </p>
        <form action="store_comment.php" method="post">
          <input type="text" id="content" name="content" class="Tcomment" placeholder="Type comment..." />
          <input type="hidden" name="project_id" value="<?= $project["project_id"] ?>" />
          <button type="submit" for="content" class="bcomment">+ Add Comment</button>
        </form>
        <?php
        $comment = $user->get_comments($project["project_id"]);
        foreach ($comment as $comment) {
        ?>
          <div class="card mb-4">
            <div class="card-body">
              <p><?= $comment["content"] ?></p>

              <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                  <img src="<?php if (!empty($comment["image"])) echo $comment["image"];
                           else echo "IMGS/userico.png" ?>" alt="" width="25"
                    height="25" />
                  <p class="small mb-0 ms-2"><?= $comment["first_name"] ?></p>
                </div>
                <div class="d-flex flex-row align-items-center">
                  <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
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
  body.addEventListener("click", e => {
    let clickedElm = e.target;
    if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
      nav.classList.remove("active");
    }
  });
</script>
<p id="ded" class="txt">@Developed by GenZ Team ^_^</p>
</body>

</html>