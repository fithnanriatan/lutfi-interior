<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <h4><i class="fas fa-calendar-check"></i> Kelola Pemesanan</h4>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i> Tambah Pemesanan
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="12%">Tanggal Booking</th>
                            <th width="15%">Nama Customer</th>
                            <th width="12%">Telepon</th>
                            <th width="15%">Layanan</th>
                            <th width="15%">Alamat</th>
                            <th width="10%">Status</th>
                            <th width="16%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['bookings'])): ?>
                            <?php $no = 1; foreach ($data['bookings'] as $booking): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= date('d/m/Y', strtotime($booking['booking_date'])); ?></td>
                                    <td><?= $booking['customer_name']; ?></td>
                                    <td><?= $booking['phone']; ?></td>
                                    <td><?= $booking['service_name']; ?></td>
                                    <td><?= substr($booking['address'], 0, 50); ?>...</td>
                                    <td>
                                        <?php
                                        $badgeClass = [
                                            'pending' => 'badge-warning',
                                            'confirmed' => 'badge-info',
                                            'completed' => 'badge-success',
                                            'cancelled' => 'badge-danger'
                                        ];
                                        ?>
                                        <span class="badge <?= $badgeClass[$booking['status']]; ?>">
                                            <?= ucfirst($booking['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-info tampilModalDetail" 
                                                    data-id="<?= $booking['id']; ?>" 
                                                    data-toggle="modal" data-target="#modalDetail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-warning tampilModalUbah" 
                                                    data-id="<?= $booking['id']; ?>" 
                                                    data-toggle="modal" data-target="#modalUbah">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="<?= BASEURL; ?>/booking/hapus/<?= $booking['id']; ?>" 
                                               class="btn btn-danger" 
                                               onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data pemesanan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Pemesanan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/booking/tambah" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Booking <span class="text-danger">*</span></label>
                                <input type="date" name="booking_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Layanan <span class="text-danger">*</span></label>
                        <select name="service_id" class="form-control" required>
                            <option value="">-- Pilih Layanan --</option>
                            <?php 
                            $serviceModel = new Service_model();
                            $services = $serviceModel->getAllServices();
                            foreach ($services as $service): 
                            ?>
                                <option value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="modalUbah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Ubah Pemesanan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/booking/ubah" method="POST">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" id="edit_customer_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="edit_phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Booking <span class="text-danger">*</span></label>
                                <input type="date" name="booking_date" id="edit_booking_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Layanan <span class="text-danger">*</span></label>
                        <select name="service_id" id="edit_service_id" class="form-control" required>
                            <?php foreach ($services as $service): ?>
                                <option value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="address" id="edit_address" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="notes" id="edit_notes" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" id="edit_status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Pemesanan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="detailContent">
                <p class="text-center">Loading...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.tampilModalUbah').on('click', function() {
        const id = $(this).data('id');
        
        $.ajax({
            url: '<?= BASEURL; ?>/booking/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#edit_id').val(data.id);
                $('#edit_customer_name').val(data.customer_name);
                $('#edit_email').val(data.email);
                $('#edit_phone').val(data.phone);
                $('#edit_booking_date').val(data.booking_date);
                $('#edit_service_id').val(data.service_id);
                $('#edit_address').val(data.address);
                $('#edit_notes').val(data.notes);
                $('#edit_status').val(data.status);
            }
        });
    });
    
    $('.tampilModalDetail').on('click', function() {
        const id = $(this).data('id');
        
        $.ajax({
            url: '<?= BASEURL; ?>/booking/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                let html = `
                    <table class="table table-bordered">
                        <tr><th width="30%">Nama Customer</th><td>${data.customer_name}</td></tr>
                        <tr><th>Email</th><td>${data.email}</td></tr>
                        <tr><th>Telepon</th><td>${data.phone}</td></tr>
                        <tr><th>Tanggal Booking</th><td>${data.booking_date}</td></tr>
                        <tr><th>Layanan</th><td>${data.service_name || '-'}</td></tr>
                        <tr><th>Alamat</th><td>${data.address}</td></tr>
                        <tr><th>Catatan</th><td>${data.notes || '-'}</td></tr>
                        <tr><th>Status</th><td><span class="badge badge-info">${data.status}</span></td></tr>
                        <tr><th>Tanggal Order</th><td>${data.created_at}</td></tr>
                    </table>
                `;
                $('#detailContent').html(html);
            }
        });
    });
});
</script>