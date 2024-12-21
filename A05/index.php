<?php
include("connect.php");

$query = "SELECT * FROM islandsofpersonality WHERE status = 'ACTIVE'";
$result = executeQuery($query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Core Memories</title>
  <link rel="icon" href="./assets/personalLogo.png" type="image" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="w3-pale-blue">
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-light-blue w3-wide w3-padding w3-card">
      <a href="#home" class="w3-bar-item w3-button" style="font-size: 20px;"><b>K</b></a>
      <div class="w3-right w3-hide-small">
        <a href="#projects" class="w3-bar-item w3-button">Personality</a>
        <a href="#about" class="w3-bar-item w3-button">About</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="./assets/insideOutBG.png" alt="backgroundImage" width="1500" height="1000">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>ISLANDS</b></span> <span
          class="w3-text-indigo">of Personality</span></h1>
    </div>
  </header>

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width:1564px">
    <div class="w3-container w3-padding-32" id="projects">
      <h3 class="w3-border-bottom w3-border-blue w3-padding-16"><b>Islands of Personality</b></h3>
    </div>

    <div class="row-container">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card-container">
          <div class="image-container">
            <div class="overlay" style="color: <?php echo $row['color']; ?>;">
              <?php echo $row['name']; ?>
            </div>
            <img src="./assets/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"
              onclick="openModal(<?php echo $row['islandOfPersonalityID']; ?>)">
          </div>
          <p class="description short-desc" style="font-size: medium;"><?php echo $row['shortDescription']; ?></p>
          <p class="description long-desc"><?php echo $row['longDescription']; ?></p>
        </div>
      <?php } ?>
    </div>

    <?php
    mysqli_close($conn);
    ?>

    <!-- Modal -->
    <div id="modal" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div id="modalContent" class="modal-body">
            <div class="row">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- About Section -->
    <div class="w3-container w3-padding-32" id="about">
      <h3 class="w3-border-bottom w3-border-blue w3-padding-16"><b>About</b></h3>
      <p style="max-width: 100%; text-align: justify;">The path I’ve taken to become the person I am today has been
        shaped by a variety of experiences, each contributing a unique lesson to my personal and professional growth.
        Just like the characters in Pixar's Inside Out, where emotions play a pivotal role in shaping Riley's
        experiences, my growth has been driven by key areas in my life—each representing different emotions and values
        that have helped me understand the world around me and, ultimately, have shaped the person I am today. Each
        experience, whether positive or challenging, has provided valuable insights that continue to influence my
        journey.
      </p>
    </div>

    <div class="w3-row-padding" style="display: flex; justify-content: center; padding: 10px;">
      <div class="w3-col l3 m6 w3-margin-bottom" style="max-width: 100%; text-align: justify; line-height: 1.2;">
        <img src="./assets/personalImage.jpg" alt="KNC" style="width:100%">
        <h3 class="text-left"><b>Kaye Niña Cristobal</b></h3>
        <p class="w3-opacity">Developer | PUPSTC</p>
      </div>
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-32" id="contact">
      <h3 class="w3-border-bottom w3-border-blue w3-padding-16"><b>Contact</b></h3>
      <p>Lets get in touch and talk about your next project.</p>
      <form action="/action_page.php" target="_blank">
        <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
        <button class="w3-button w3-black w3-section" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </form>
    </div>

    <!-- Footer -->
    <footer class="text-center py-5">
      <div class="container-fluid d-flex justify-content-center align-items-center">
        <a href="https://raw.githack.com/kayexnina/SAM-BE/main/index.html">
          <img src="./assets/insideOutLogo.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
        </a>
      </div>
    </footer>
    <script>
      function openModal(islandId) {
        fetch(`fetch_islandcontents.php?id=${islandId}`)
          .then(response => response.json())
          .then(data => {
            const modalContent = document.getElementById("modalContent");
            modalContent.innerHTML = "";
            const modalGrid = document.createElement("div");
            modalGrid.classList.add("modal-grid");

            data.forEach(item => {
              const contentDiv = document.createElement("div");
              const imageElement = document.createElement("img");
              imageElement.src = `./assets/${item.image}`;
              imageElement.alt = item.content;

              contentDiv.innerHTML = `
            <p><span style="color: ${item.color}; font-size: 32px; font-weight: bold;">|</span> ${item.content}</p>
          `;
              contentDiv.prepend(imageElement);
              modalGrid.appendChild(contentDiv);
            });

            modalContent.appendChild(modalGrid);
            const modalElement = new bootstrap.Modal(document.getElementById('modal'));
            modalElement.show();
          })
          .catch(err => console.error("Error fetching data:", err));
      }
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
</body>

</html>