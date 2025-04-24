<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyApp</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    
    <style>
        :root {
            --primary-bg: #121212;
            --secondary-bg: #1e1e1e;
            --text-primary: #ffffff;
            --text-secondary: #aaaaaa;
            --accent-color: #9c27b0;
            --accent-hover: #7b1fa2;
            --error-color: #cf6679;
            --success-color: #03dac6;
        }
        
        body {
            background-color: var(--primary-bg);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            background-color: var(--secondary-bg);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }
        
        .brand-wrapper {
            margin-bottom: 35px;
            text-align: center;
        }
        
        .brand-name {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent-color), var(--success-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-floating .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-primary);
            height: 60px;
            padding: 25px 15px 15px;
        }
        
        .form-floating .form-control:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(156, 39, 176, 0.25);
        }
        
        .form-floating label {
            color: var(--text-secondary);
            padding: 20px 15px;
        }
        
        .form-floating .form-control:focus ~ label,
        .form-floating .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-11px);
            opacity: 0.8;
        }
        
        .btn-login {
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(156, 39, 176, 0.4);
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 20px;
            color: var(--text-secondary);
            cursor: pointer;
            z-index: 10;
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            color: var(--text-secondary);
        }
        
        .register-link a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .register-link a:hover {
            color: var(--accent-hover);
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: rgba(3, 218, 198, 0.15);
            border-color: var(--success-color);
            color: var(--success-color);
        }
        
        .alert-danger {
            background-color: rgba(207, 102, 121, 0.15);
            border-color: var(--error-color);
            color: var(--error-color);
        }
        
        .form-floating .input-group {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="brand-wrapper">
            <h1 class="brand-name">MyApp</h1>
        </div>
        
        <h2 class="form-title">Masuk ke Akun Anda</h2>
        
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= base_url('auth/processLogin') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?= old('email') ?>">
                <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
            </div>
            
            <div class="form-floating mb-4 position-relative">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                <span class="password-toggle" onclick="togglePassword()">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>
            
            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Masuk
            </button>
        </form>
        
        <div class="register-link">
            Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar sekarang</a>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>