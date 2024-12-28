<?php
    session_start();
    $is_logged_in = isset($_SESSION['user']); // Cek apakah user login
    echo "<script>var isLoggedIn = " . json_encode($is_logged_in) . ";</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Draco Code - Kelas</title>
  <link rel="stylesheet" href="assets/css/class.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav>
        <img src="assets/images/logo.png" alt="" width="112px">
        <ul>
            <li><a href="Index.php">Beranda</a></li>
            <li><a href="menu-class.php">Kelas</a></li>
            <li><a href="menu-forum.php">Forum</a></li>
            <li><a href="menu-aboutUs.php">About Us</a></li>
        </ul>
        <?php if (isset($_SESSION['user'])): ?>
            <div class="user-info">
                <span>Halo, <?= htmlspecialchars($_SESSION['user']['name']); ?></span>
                <a href="logout.php"><button class="btn-logout">Keluar</button></a>
            </div>
        <?php else: ?>
            <a href="menu-login.php"><button class="btn-login">Masuk</button></a>
        <?php endif; ?>
    </nav>
  </header>
  <div class="container">
        <section class="header-section">
            <h1>Pelajari Berbagai Bahasa Pemrograman Terpopuler Dan Relevan Di Industri</h1>

            <div class="search-bar">
                <input type="text" placeholder="Cari Kursus">
                <button>Cari</button>
            </div>
        </section>
  <section>
    <div class="cards">
      <div class="card" data-id="frontend" >
        <img src="assets/images/class-img1.jpg" alt="Front-End">
        <div class="card-content">
          <h3>Front-End Web Developer</h3>
          <p>HTML, CSS, JS & React</p>
          <a href="menu-class-enroll.php">Gabung</a>
        </div>
      </div>
      <div class="card" data-id="backend">
        <img src="assets/images/class-img2.jpg" alt="Back-End">
        <div class="card-content">
          <h3>Back-End Web Developer</h3>
          <p>Node.js, Python, PHP, Java</p>
          <a href="#">Mulai</a>
        </div>
      </div>
      <div class="card" data-id="mobile">
        <img src="assets/images/class-img3.jpg" alt="Mobile">
        <div class="card-content">
          <h3>Mobile Application Developer</h3>
          <p>Flutter, Kotlin, Swift</p>
          <a href="#">Mulai</a>
        </div>
      </div>
      <div class="card" data-id="datascience" >
        <img src="assets/images/class-img4.jpg" alt="Data Science">
        <div class="card-content">
          <h3>Data Science Course</h3>
          <p>Python, R, SQL</p>
          <a href="#">Mulai</a>
        </div>
      </div>
    </div>
  </section>

    <section class="news-discussion-section">
      <h1>Forum diskusi terkait kelas</h1>
      <div class="card-news">
        <div class="card-header">
          <img src="assets/images/userMan-img.png" alt="User Profile Picture">
          <div class="user-info">
            <h3>Muhamad Arif</h3>
            <p>25 Desember 2024</p>
          </div>
        </div>
        <div class="card-news-content">
          <p class="hashtags">
            #apa itu firebase #backend as a service #software developer
          </p>
          <h2>Apa itu Firebase? Pengertian dan Manfaatnya bagi Developer Aplikasi</h2>
        </div>
        <div class="card-footer">
          <div class="reactions">
            <img src="assets/images/like-icon.png" alt="Love Emoji"> 3 Reaksi
          </div>
          <div class="comments">
            <img src="assets/images/comment-icon.png" alt="Comment Emoji"> 2 Komentar
          </div>
          <div class="save">
            <img src="assets/images/save-icon.png" alt="Save Emoji"> 2 Komentar
          </div>
        </div>
      </div>
    </section>
    <section class="news-discussion-section">
      <div class="card-news">
        <div class="card-header">
          <img src="assets/images/userMan-img.png" alt="User Profile Picture">
          <div class="user-info">
            <h3>Muhamad Arif</h3>
            <p>25 Desember 2024</p>
          </div>
        </div>
        <div class="card-news-content">
          <p class="hashtags">
            #apa itu firebase #backend as a service #software developer
          </p>
          <h2>Apa itu Firebase? Pengertian dan Manfaatnya bagi Developer Aplikasi</h2>
        </div>
        <div class="card-footer">
          <div class="reactions">
            <img src="assets/images/like-icon.png" alt="Love Emoji"> 3 Reaksi
          </div>
          <div class="comments">
            <img src="assets/images/comment-icon.png" alt="Comment Emoji"> 2 Komentar
          </div>
          <div class="save">
            <img src="assets/images/save-icon.png" alt="Save Emoji"> 2 Komentar
          </div>
        </div>
      </div>
    </section>
    <section class="news-discussion-section">
      <div class="card-news">
        <div class="card-header">
          <img src="assets/images/userMan-img.png" alt="User Profile Picture">
          <div class="user-info">
            <h3>Muhamad Arif</h3>
            <p>25 Desember 2024</p>
          </div>
        </div>
        <div class="card-news-content">
          <p class="hashtags">
            #apa itu firebase #backend as a service #software developer
          </p>
          <h2>Apa itu Firebase? Pengertian dan Manfaatnya bagi Developer Aplikasi</h2>
        </div>
        <div class="card-footer">
          <div class="reactions">
            <img src="assets/images/like-icon.png" alt="Love Emoji"> 3 Reaksi
          </div>
          <div class="comments">
            <img src="assets/images/comment-icon.png" alt="Comment Emoji"> 2 Komentar
          </div>
          <div class="save">
            <img src="assets/images/save-icon.png" alt="Save Emoji"> 2 Komentar
          </div>
        </div>
      </div>
    </section>
    
  </div>


  <footer>
    <div class="footer-content">
        <p>Mentor Terbaik Untuk Membantu Anda Menguasai Pemrograman dan Beragam Teknologi</p>
        <div class="footer-links">
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Terms of Use</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>
  </footer>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
      card.addEventListener("click", () => {
        const courseId = card.getAttribute("data-id");
        // Redirect to the specific course page or dynamically load content
        window.location.href = `menu-class-enroll.php?course=${courseId}`;
      });
    });
  });
</script>

</body>
</html>
