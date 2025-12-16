<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Electronics Online</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .box {
            width:400px; margin:50px auto; padding:20px;
            background:#fff; border-radius:10px;
        }
        input, button {
            width:100%; padding:10px; margin-top:10px;
        }
        button {
            background:#28a745; color:#fff;
            border:none; cursor:pointer;
        }
    </style>
</head>
<body>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronics Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Electronics Online</h1>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>
</header>

<div class="box">
    <h2>Electronics Online</h2>

    <form method="POST">
        <input type="text" name="ename" placeholder="Enter electronic device" required>
        <button type="submit" name="search">Submit</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $ename = $_POST['ename'];

        $stmt = $conn->prepare(
            "SELECT type, price FROM electronics WHERE electronics_name = ?"
        );
        $stmt->execute([$ename]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            echo "<h3>Type: {$row['type']}</h3>";
            echo "<h3>Price: ₹{$row['price']}</h3>";
        } else {
            echo "<p>No product found</p>";
        }
    }
    ?>
</div>

<!-- HOME -->
<section id="home" class="section home">
    

    <div class="home-image">
        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475" alt="Electronics">
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="section">
    <h2>About Us</h2>
    <p>
        Electronics Online is a modern platform providing high-quality electronic products
        including mobiles, laptops, home appliances, and smart gadgets.
    </p>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="section light">
    <h2>Portfolio</h2>
    <p>Our portfolio includes innovative electronics and smart technology solutions.</p>
</section>

<!-- GALLERY -->
<section id="gallery" class="section">
    <h2>Gallery</h2>
    <div class="gallery">
        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8">
        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e">
        <img src="https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04">
        <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9">
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="section light">
    <h2>Contact Us</h2>
    <p>Email: support@electronicsonline.com</p>
    <p>Phone: +91 98765 43210</p>
</section>

<footer>
    <p>© 2025 Electronics Online. All Rights Reserved.</p>
</footer>

</body>
</html>


</body>
</html>
