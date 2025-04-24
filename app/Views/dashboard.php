<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #120025;
            color: #ffffff;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            position: relative;
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 10px;
            color: #ffffff;
        }

        .logo-circle {
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, #ffffff 20%, #d359ff 40%, #9400d3 70%);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #d359ff;
        }

        .active {
            position: relative;
        }

        .active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: #ffffff;
        }

        /* Logout Button */
        .logout-btn {
            background-color: rgba(211, 89, 255, 0.2);
            color: #ffffff;
            border: 1px solid #d359ff;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logout-btn:hover {
            background-color: #d359ff;
            box-shadow: 0 0 15px rgba(211, 89, 255, 0.7);
        }

        .logout-btn i {
            font-size: 0.9rem;
        }

        /* Hero Section */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 20px;
            height: 80vh;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(211, 89, 255, 0.7);
        }

        .hero h2 {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 20px;
            color: #d359ff;
        }

        .hero p {
            font-size: 1rem;
            max-width: 600px;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        .cta-button {
            background-color: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #ffffff;
            color: #4a0082;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
        }

        /* Background Elements */
        .bg-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .mountain {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60%;
            background: #2a005e;
            -webkit-clip-path: polygon(0 70%, 25% 40%, 50% 60%, 75% 30%, 100% 50%, 100% 100%, 0 100%);
            clip-path: polygon(0 70%, 25% 40%, 50% 60%, 75% 30%, 100% 50%, 100% 100%, 0 100%);
        }

        .mountain-front {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40%;
            background: #1a0042;
            -webkit-clip-path: polygon(0 70%, 20% 50%, 40% 65%, 60% 40%, 80% 55%, 100% 35%, 100% 100%, 0 100%);
            clip-path: polygon(0 70%, 20% 50%, 40% 65%, 60% 40%, 80% 55%, 100% 35%, 100% 100%, 0 100%);
        }

        .trees {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 30%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23000000' fill-opacity='0.5' d='M0,96L30,101.3C60,107,120,117,180,138.7C240,160,300,192,360,186.7C420,181,480,139,540,144C600,149,660,203,720,208C780,213,840,171,900,160C960,149,1020,171,1080,165.3C1140,160,1200,128,1260,128C1320,128,1380,160,1410,176L1440,192L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
        }

        .moon {
            position: absolute;
            top: 100px;
            left: 100px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #ffffff 30%, #d359ff 70%);
            border-radius: 50%;
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.8);
        }

        .wave {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%236a0dad' fill-opacity='0.3' d='M0,128L48,144C96,160,192,192,288,197.3C384,203,480,181,576,154.7C672,128,768,96,864,106.7C960,117,1056,171,1152,176C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            opacity: 0.8;
            z-index: 1;
        }

        /* Footer */
        footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
            z-index: 10;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .hero h1 {
                font-size: 3rem;
            }

            .hero h2 {
                font-size: 1.2rem;
            }

            .nav-links {
                gap: 15px;
            }

            .moon {
                top: 70px;
                left: 70px;
                width: 60px;
                height: 60px;
            }
            
            .logout-btn {
                padding: 6px 15px;
                font-size: 0.8rem;
            }
        }

        @media screen and (max-width: 480px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero h2 {
                font-size: 1rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .nav-links {
                gap: 10px;
            }
            
            .nav-links a {
                font-size: 0.9rem;
            }

            .logo-circle {
                width: 30px;
                height: 30px;
            }

            .logo-text {
                font-size: 1.2rem;
            }

            .moon {
                top: 50px;
                left: 50px;
                width: 50px;
                height: 50px;
            }
            
            .logout-btn {
                padding: 5px 12px;
                font-size: 0.8rem;
                margin-left: 10px;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="logo">
                <div class="logo-circle"></div>
                <div class="logo-text">Ahmad Diksa S</div>
            </div>
            <div class="nav-links">
                <a href="#" class="active">Home</a>
                <a href="#">About us</a>
                <a href="#">Service</a>
                <a href="#">Contact</a>
<a href="/auth/logout" class="logout-btn">
    <i class="fas fa-sign-out-alt"></i> Logout
</a>
            </div>
        </nav>

        <div class="bg-elements">
            <div class="moon"></div>
            <div class="wave"></div>
            <div class="mountain"></div>
            <div class="mountain-front"></div>
            <div class="trees"></div>
        </div>

        <div class="hero">
            <h1>WELCOME</h1>
            <h2>to our community</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget libero feugiat.</p>
            <a href="#" class="cta-button">JOIN US NOW</a>
        </div>

        <footer>
            Created By Ahmad Diksa Sumadiono
        </footer>
    </div>
</body>
</html>