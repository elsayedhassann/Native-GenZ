<link rel="stylesheet" href="find_one.css" />
<?php
require_once('header.php');
$projects = $user->home_projects();
?>
<div class="container">
  <h1>Available...</h1>
  <hr />
  <?php
  foreach ($projects as $project) {
  ?>
    <div class="scard">
      <div class="label">
        <div class="usercom">
          <p style="font-size: x-small;"><i class="bx bx-time time"></i>from <?= $project["created_at"] ?></p>
            <a style="text-decoration: none;color: black;" href="Portfolio.php?user_id=<?= $project["user_id"] ?>"><p class="image-name"style="text-transform: capitalize; font-size: x-large;font-weight: 800; "><?=$project["owner_first_name"] ?> <?= $project["owner_last_name"] ?><img src="<?php if (!empty($project["owner_img"])) echo $project["owner_img"];
                          else echo "IMGS/userico.png" ?>" class="PicUser2"></p></a>
        </div>
        <h2 for="title" style="text-align: center;text-transform: capitalize;"><?= $project["title"] ?> </h2>
        <p class="content">
          <div class="doublesub">
            <p><i class="bx bxl-codepen "></i>Depart <?= $project["depart"] ?></p>
            <p><i class="bx bx-money"></i>Price <?= $project["price"] ?></p>
            <p><i class="bx bx-layer"></i>Experince <?= $project["experince"] ?></p>
          </div>
          <hr>
          <?= $project["descripe"] ?>
          <hr>
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
          <div class="card mb-4" id="comcard">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="usercom">
                  <p style="font-size: x-small;"><?= $comment["created_at"] ?></p>
                  <div class="subusercom">

                    <a style="text-decoration: none;color: black;" href="Portfolio.php?user_id=<?= $comment["user_id"] ?>" ><p style="text-transform: capitalize; font-size: x-large;font-weight: 800; "><?= $comment["first_name"] ?></p></a>
                    <img src="<?php if (!empty($comment["img"])) echo $comment["img"];
                             else echo "IMGS/userico.png" ?>" alt="" width="25"
                      height="25" />
                  </div>

                </div>

              </div>
              <p style="font-size: larger;"><?= $comment["content"] ?></p>

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

