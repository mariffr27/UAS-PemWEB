<?php
// Memeriksa apakah parameter 'course' ada dalam URL
// Param login
session_start();
    $is_logged_in = isset($_SESSION['user']); // Cek apakah user login
    echo "<script>var isLoggedIn = " . json_encode($is_logged_in) . ";</script>";

$course = isset($_GET['course']) ? $_GET['course'] : 'default';


// Memuat file JSON
$jsonData = file_get_contents('course.json');
$courses = json_decode($jsonData, true); // Mengonversi JSON menjadi array PHP

// Memeriksa apakah course yang diminta ada dalam array courses
$courseData = isset($courses[$course]) ? $courses[$course] : $courses['frontend']; // Default jika course tidak ditemukan
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DracoCode - Tingkatkan Kemampuan Belajar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header */
        header {
  background: #f3f3f3;
  padding: 10px 20px;
  align-items: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  top: 0;
  z-index: 1000;
}

.main-bar {
  display: flex;
  align-items: center;
  gap: 20px;
  justify-content: space-between;
}

.main-bar ul {
  display: flex;
  gap: 20px;
  margin: 0;
}

.main-bar ul li {
  font-size: 1rem;
}
.main-bar .navbar {
  display: flex;
  list-style: none;
}

.main-bar .menu-toggle {
  display: none; /* Sembunyikan secara default */
  font-size: 1.5rem;
  background-color: transparent;
  border: none;
  cursor: pointer;
}

.main-bar .navbar ul li a {
  text-decoration: none;
  color: #333;
}


.main-bar .btn-login {
  padding: 8px 16px;
  background: #007BFF;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  right: -100%; /* Awalnya tersembunyi di sebelah kanan */
  width: 250px;
  height: 100%;
  background-color: #007BFF;
  color: #fff;
  overflow-y: auto;
  transition: right 0.3s ease-in-out;
  padding: 15px;
  box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5); /* Bayangan di sisi kiri sidebar */
  z-index: 999; /* Pastikan di atas elemen lainnya */
}
.sidebar.active {
  right: 0; /* Geser sidebar masuk ke dalam layar */
}

/* Close Button (X) */
.sidebar .close-btn {
  position: absolute;
  top: 10px;
  left: 10px;
  font-size: 1.5rem;
  cursor: pointer;
}


.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin: 30px 0;
}

.sidebar ul a {
  text-decoration: none;
  color: #fff;
  font-size: 18px;
}

.sidebar ul li a:hover {
  color: #3498db; /* Warna saat hover */
}


.close-btn {
  font-size: 24px;
  text-align: left; /* Tetap di kiri dalam sidebar */
  cursor: pointer;
  margin-bottom: 20px;
  color: #fff;
}

/* Login user */

.user-info span {
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

.btn-logout, .btn-login {
  background-color: #e74c3c; /* Warna latar belakang tombol */
  color: white; /* Warna teks tombol */
  border: none; /* Menghilangkan border */
  padding: 10px 15px; /* Padding dalam tombol */
  border-radius: 5px; /* Sudut membulat */
  cursor: pointer; /* Kursor pointer saat hover */
  font-size: 16px; /* Ukuran font */
  transition: background-color 0.3s; /* Transisi warna latar belakang */
}

/* Search */

/* Search bar */
.header-section h1 {
    text-align: center;
}

.search-bar {
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
  margin-top: 20px;
}

.search-bar input {
  width: 80%;
  max-width: 500px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px 0 0 5px;
  outline: none;
}

.search-bar button {
  padding: 10px 20px;
  border: none;
  background-color: #007BFF;
  color: #fff;
  cursor: pointer;
  border-radius: 0 5px 5px 0;
}

/* End */
        .details-section {
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;  
        }

        .details-section:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .details-card {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            max-width: 1100px;
            overflow: hidden;
        }

        .details-card img {
            width: 40%;
            height: auto;
            border-radius: 10px 0 0 10px;
        }

        .details-card .text-content {
            padding: 20px;
        }

        .details-card h3 {
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .details-card p {
            font-size: 1.1em;
        }

        .content-img {
            display: flex;
            flex-direction: column;
        }
        .content-img img {
            width: 7%;
            height: 7%;
            margin: 6px;
        }
        .detail-content {
            display: flex;
            align-items: center;
        }

        #course-creator {
            color: #0066cc;
            cursor: pointer;
        }
.btn-enroll-class {
    width: 100%;
    background-color: black;
    color: white; 
    border: none; 
    padding: 10px 20px; 
    text-align: center; 
    text-decoration: none; 
    display: inline-block; 
    font-size: 16px; 
    margin: 4px 2px; 
    cursor: pointer; 
    border-radius: 5px; 
    transition: background-color 0.3s; 
}

.btn-enroll-class:hover {
    background-color: #333; /* Warna latar belakang saat hover */
}

        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        footer .links a {
            color: #ffcc00;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer .links a:hover {
            color: white;
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 1s ease-in forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<header>
        <nav>
            <div class="main-bar">
                <img src="assets/images/logo.png" alt="logo" class="logo-web" style="max-width: 100px;">
                <button class="menu-toggle">☰</button>
                <ul class="navbar">
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
            </div>
        </nav>
    
    <div class="sidebar">
        <span class="close-btn">&times;</span>
        <ul>
            <li><a href="Index.php">Beranda</a></li>
            <li><a href="menu-class.php">Kelas</a></li>
            <li><a href="menu-forum.php">Forum</a></li>
            <li><a href="menu-aboutUs.php">About Us</a></li>
            <li>
            <?php if (isset($_SESSION['user'])): ?>
            <div class="user-info">
                <span>Halo, <?= htmlspecialchars($_SESSION['user']['name']); ?></span>
                <a href="logout.php"><button class="btn-logout">Keluar</button></a>
            </div>
        <?php else: ?>
            <a href="menu-login.php"><button class="btn-login">Masuk</button></a>
        <?php endif; ?>
            </li>
        </ul>
    </div>
        
</header>


<div class="container">
        <section class="header-section">
            <h1>Pelajari Berbagai Bahasa Pemrograman Terpopuler Dan Relevan Di Industri</h1>

        </section>  

    <div class="details-section">
        <div class="details-card">
            <img src="<?= htmlspecialchars($courseData['image']); ?>" alt="<?= htmlspecialchars($courseData['title']); ?>">
            <div class="text-content">
                <h3><?= htmlspecialchars($courseData['title']); ?></h3>
                <p><?= htmlspecialchars($courseData['description']); ?></p>
                <div class="content-img">
                    <div class="detail-content">
                        <img src="assets/images/detail-course-img.png" alt="Materi Pembelajaran">
                        <p><?= htmlspecialchars($courseData['materi']); ?></p>
                    </div>
                    <div class="detail-content">
                    <img src="assets/images/detail-course-img2.png" alt="Vidio Pembelajaran">
                        <p><?= htmlspecialchars($courseData['materiVideo']); ?></p>
                    </div>
                    <p>Dibuat oleh <span id="course-creator">Muhamad Arif, Rozak arts</span></p>
                </div>
                <button class="btn-enroll-class" data-id="<?= htmlspecialchars($course) ?>">Gabung Kelas</button>
            </div>
        </div>
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
  const buttons = document.querySelectorAll(".btn-enroll-class");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const courseId = button.getAttribute("data-id");
      // Redirect ke halaman menu-class-course.php dengan parameter courseId
      window.location.href = `menu-class-course.php?course=${courseId}`;
    });
  });
});
</script>

</body>
</html>
