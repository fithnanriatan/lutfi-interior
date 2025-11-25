<!-- Statistics Cards -->
<div class="row">
    <!-- Services Card -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Layanan</h6>
                        <h2 class="mb-0" style="color: var(--primary-color);">
                            <?= $data['totalServices'] ?? 0; ?>
                        </h2>
                    </div>
                    <div class="stat-icon" style="color: var(--primary-color);">
                        <i class="fas fa-th-large"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bookings Card -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card stat-card" style="border-left-color: #17a2b8;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Pemesanan</h6>
                        <h2 class="mb-0 text-info">
                            <?= $data['totalBookings'] ?? 0; ?>
                        </h2>
                    </div>
                    <div class="stat-icon text-info">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Portfolio Card -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card stat-card" style="border-left-color: #28a745;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Portfolio</h6>
                        <h2 class="mb-0 text-success">
                            <?= $data['totalPortfolios'] ?? 0; ?>
                        </h2>
                    </div>
                    <div class="stat-icon text-success">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Reviews Card -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card stat-card" style="border-left-color: #ffc107;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Review</h6>
                        <h2 class="mb-0 text-warning">
                            <?= $data['totalReviews'] ?? 0; ?>
                        </h2>
                    </div>
                    <div class="stat-icon text-warning">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Items -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-exclamation-circle"></i> Pemesanan Pending
            </div>
            <div class="card-body">
                <h3 class="text-warning"><?= $data['pendingBookings'] ?? 0; ?></h3>
                <p class="mb-0">Pemesanan menunggu konfirmasi</p>
                <a href="<?= BASEURL; ?>/booking" class="btn btn-sm btn-primary mt-2">
                    Lihat Semua
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-clock"></i> Review Pending
            </div>
            <div class="card-body">
                <h3 class="text-info"><?= $data['pendingReviews'] ?? 0; ?></h3>
                <p class="mb-0">Review menunggu persetujuan</p>
                <a href="<?= BASEURL; ?>/review" class="btn btn-sm btn-primary mt-2">
                    Lihat Semua
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list"></i> Pemesanan Terbaru
            </div>
            <div class="card-body">
                <?php if (!empty($data['recentBookings'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Customer</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['recentBookings'] as $booking): ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($booking['created_at'])); ?></td>
                                        <td><?= $booking['customer_name']; ?></td>
                                        <td><?= $booking['service_name']; ?></td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                        <td>
                                            <a href="<?= BASEURL; ?>/booking" class="btn btn-sm btn-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mb-0">
                        Tidak ada pemesanan pending
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-bolt"></i> Quick Actions
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 mb-3">
                        <a href="<?= BASEURL; ?>/service" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-plus-circle"></i><br>
                            Tambah Layanan
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="<?= BASEURL; ?>/portfolio" class="btn btn-outline-success btn-block">
                            <i class="fas fa-plus-circle"></i><br>
                            Tambah Portfolio
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="<?= BASEURL; ?>/booking" class="btn btn-outline-info btn-block">
                            <i class="fas fa-eye"></i><br>
                            Lihat Pemesanan
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="<?= BASEURL; ?>" target="_blank" class="btn btn-outline-secondary btn-block">
                            <i class="fas fa-external-link-alt"></i><br>
                            Lihat Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>