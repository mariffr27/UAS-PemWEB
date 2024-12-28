<?php
// Memeriksa apakah parameter 'course' ada dalam URL
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

        header {
            background-color: #0066cc;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        header nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ffcc00;
        }

        .hero {
            background: linear-gradient(to right, #0066cc, #003366);
            color: white;
            text-align: center;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .hero button {
            background-color: #ffcc00;
            border: none;
            padding: 10px 20px;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .hero button:hover {
            transform: scale(1.1);
        }

        .search-section {
            padding: 40px 20px;
            text-align: center;
        }

        .search-section input[type="text"] {
            width: 60%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-section button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .search-section button:hover {
            background-color: #003366;
        }

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
        <div class="logo">DracoCode</div>
        <nav>
            <a href="#">Beranda</a>
            <a href="#">Kelas</a>
            <a href="#">Forum</a>
            <a href="#">About us</a>
            <a href="#" class="fade-in">Masuk</a>
        </nav>
    </header>

    <div class="hero fade-in">
        <h1>Tingkatkan kemampuan belajar hari ini!</h1>
        <p>Mulai dengan materi dasar yang mudah dipahami untuk pemula dan kuasai berbagai bahasa pemrograman.</p>
        <button>Mulai Belajar Sekarang</button>
    </div>

    <div class="search-section">
        <h2>Pelajari Berbagai Bahasa Pemrograman Terpopuler Dan Relevan Di Industri</h2>
        <input type="text" placeholder="Cari kursus...">
        <button>Cari</button>
    </div>

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
        <p>&copy; 2024 DracoCode. Semua Hak Dilindungi.</p>
        <div class="links">
            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
            <a href="#">LinkedIn</a>
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
