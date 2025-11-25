<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2691E;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        
        .login-left {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.95), rgba(210, 105, 30, 0.95)),
                        url('<?= BASEURL; ?>/img/login-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-left h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .login-right {
            padding: 60px 40px;
        }
        
        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 40px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
        }
        
        .back-home {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-home:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="login-container">
            <div class="row g-0">
                <!-- Left Side -->
                <div class="col-lg-6 login-left d-none d-lg-flex">
                    <div>
                        <i class="fas fa-couch fa-4x mb-4"></i>
                        <h2>Lutfi Interior</h2>
                        <p class="lead">Admin Panel</p>
                        <p>Kelola layanan, portfolio, pemesanan, dan review dengan mudah</p>
                    </div>
                </div>
                
                <!-- Right Side -->
                <div class="col-lg-6 login-right">
                    <div class="text-center mb-4">
                        <h3 class="mb-2" style="color: var(--primary-color);">
                            <i class="fas fa-lock"></i> Login Admin
                        </h3>
                        <p class="text-muted">Masukkan kredensial Anda</p>
                    </div>
                    
                    <!-- Flash Message -->
                    <?php Flasher::flash(); ?>
                    
                    <form action="<?= BASEURL; ?>/auth/proses" method="POST">
                        <div class="form-group mb-4">
                            <label for="username" class="font-weight-bold">
                                <i class="fas fa-user"></i> Username
                            </label>
                            <input type="text" class="form-control" id="username" name="username" 
                                   placeholder="Masukkan username" required autofocus>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="password" class="font-weight-bold">
                                <i class="fas fa-key"></i> Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Masukkan password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-login mt-3">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <a href="<?= BASEURL; ?>" class="back-home">
                            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                    
                    <div class="alert alert-info mt-4" role="alert">
                        <strong>Demo Login:</strong><br>
                        Username: <code>admin</code><br>
                        Password: <code>admin123</code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
</body>
</html>