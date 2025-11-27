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
            --primary-color: #007bff;
            --secondary-color: #5d5df6ff;
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
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 600px;
            max-height: 650px;
            width: 100%;
        }

        .login-right {
            padding: 50px 30px;
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

    <div class="login-container">
        <!-- Right Side -->
        <div class="col-lg-12 login-right">
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

            <div class="text-left mt-4">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
</body>

</html>