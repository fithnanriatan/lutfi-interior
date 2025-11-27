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
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
        }

        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: var(--sidebar-bg);
            padding-top: 20px;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li a {
            display: block;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background-color: var(--sidebar-hover);
            color: white;
            border-left: 4px solid var(--secondary-color);
            padding-left: 21px;
        }

        .sidebar-menu li a i {
            width: 25px;
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            padding: 15px 30px;
            margin: -20px -20px 20px -20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
        }

        /* Stat Card */
        .stat-card {
            border-left: 4px solid var(--primary-color);
        }

        .stat-card .stat-icon {
            font-size: 3rem;
            opacity: 0.3;
        }

        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }

        /* Table */
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(139, 69, 19, 0.05);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-couch"></i> Lutfi Interior
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?= BASEURL; ?>/dashboard" <?= (strpos($_SERVER['REQUEST_URI'], '/dashboard') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <hr>
            <li>
                <a href="<?= BASEURL; ?>/service" <?= (strpos($_SERVER['REQUEST_URI'], '/service') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-th-large"></i> Kelola Layanan
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/booking" <?= (strpos($_SERVER['REQUEST_URI'], '/booking') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-calendar-check"></i> Kelola Pemesanan
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/portfolio" <?= (strpos($_SERVER['REQUEST_URI'], '/portfolio') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-images"></i> Kelola Portfolio
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/review" <?= (strpos($_SERVER['REQUEST_URI'], '/review') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-star"></i> Kelola Review
                </a>
            </li>
            <hr>
            <li>
                <a href="<?= BASEURL; ?>/user" <?= (strpos($_SERVER['REQUEST_URI'], '/user') !== false) ? 'class="active"' : ''; ?>>
                    <i class="fas fa-user"></i> Kelola User
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Lihat Website
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/auth/logout" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <h4 class="mb-0"><?= $data['title']; ?></h4>
            <div class="user-info">
                <i class="fas fa-user-circle fa-2x text-muted"></i>
                <div class="ml-2">
                    <strong><?= $_SESSION['name'] ?? 'Admin'; ?></strong>
                    <br>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>
        </div>

        <!-- Flash Message -->
        <?php Flasher::flash(); ?>

        <!-- Content Start -->