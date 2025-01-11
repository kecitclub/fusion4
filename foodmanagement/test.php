<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation - Share the Blessing</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        /* Navigation Styles */
        .navbar {
            background-color: #674a6e;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: rgba(255,255,255,0.1);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('/api/placeholder/1200/600') center/cover;
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #674a6e;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #523b57;
        }

        /* Features Section */
        .features {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            color: #674a6e;
            margin-bottom: 1rem;
        }

        .impact {
            background-color: #674a6e;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .impact-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 2rem auto 0;
        }

        .stat-card {
            padding: 2rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-links {
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            margin: 0 0.5rem;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-content {
                flex-direction: column;
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.html'; ?>

    <section class="hero">
        <h1>Share Food, Share Love</h1>
        <p>Join us in our mission to reduce food waste and help those in need. Your donation can make a difference in someone's life today.</p>
        <a href="donate.php" class="cta-button">Donate Now</a>
    </section>

    <section class="features">
        <h2 style="text-align: center; margin-bottom: 2rem;">How It Works</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Register Food</h3>
                <p>Fill out a simple form with details about the food you wish to donate.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3>We Collect</h3>
                <p>Our volunteers will pick up the food from your specified location.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3>We Distribute</h3>
                <p>Food is distributed to those in need through our network of partners.</p>
            </div>
        </div>
    </section>

    <section class="impact">
        <h2>Our Impact</h2>
        <div class="impact-stats">
            <div class="stat-card">
                <div class="stat-number">5000+</div>
                <p>Meals Donated</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <p>Active Donors</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <p>Partner Organizations</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Food Donation Platform. All rights reserved.</p>
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
    </footer>
</body>
</html>