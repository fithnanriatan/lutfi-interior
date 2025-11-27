<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <h4><i class="fas fa-star"></i> Kelola Review</h4>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i> Tambah Review
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
                            <th width="20%">Nama Customer</th>
                            <th width="10%">Rating</th>
                            <th width="40%">Komentar</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['reviews'])): ?>
                            <?php $no = 1; foreach ($data['reviews'] as $review): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $review['customer_name']; ?></td>
                                    <td>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $review['rating']): ?>
                                                <i class="fas fa-star text-warning"></i>
                                            <?php else: ?>
                                                <i class="far fa-star text-warning"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </td>
                                    <td><?= $review['comment']; ?></td>
                                    <td>
                                        <?php if ($review['is_approved'] == 1): ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($review['is_approved'] == 0): ?>
                                            <a href="<?= BASEURL; ?>/review/approve/<?= $review['id']; ?>" 
                                               class="btn btn-success btn-sm" 
                                               onclick="return confirm('Setujui review ini?')">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= BASEURL; ?>/review/unapprove/<?= $review['id']; ?>" 
                                               class="btn btn-secondary btn-sm" 
                                               onclick="return confirm('Batalkan persetujuan?')">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php endif; ?>
                                        <button class="btn btn-warning btn-sm tampilModalUbah" 
                                                data-id="<?= $review['id']; ?>" 
                                                data-toggle="modal" data-target="#modalUbah">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= BASEURL; ?>/review/hapus/<?= $review['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data review</td>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Review</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/review/tambah" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Customer <span class="text-danger">*</span></label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Rating <span class="text-danger">*</span></label>
                        <select name="rating" class="form-control" required>
                            <option value="">-- Pilih Rating --</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4">⭐⭐⭐⭐ (4)</option>
                            <option value="3">⭐⭐⭐ (3)</option>
                            <option value="2">⭐⭐ (2)</option>
                            <option value="1">⭐ (1)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Komentar <span class="text-danger">*</span></label>
                        <textarea name="comment" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="is_approved" class="form-control" required>
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Ubah Review</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/review/ubah" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Customer <span class="text-danger">*</span></label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Rating <span class="text-danger">*</span></label>
                        <select name="rating" id="rating" class="form-control" required>
                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4">⭐⭐⭐⭐ (4)</option>
                            <option value="3">⭐⭐⭐ (3)</option>
                            <option value="2">⭐⭐ (2)</option>
                            <option value="1">⭐ (1)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Komentar <span class="text-danger">*</span></label>
                        <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="is_approved" id="is_approved" class="form-control" required>
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
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

<script>
$(document).ready(function() {
    $('.tampilModalUbah').on('click', function() {
        const id = $(this).data('id');
        
        $.ajax({
            url: '<?= BASEURL; ?>/review/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#customer_name').val(data.customer_name);
                $('#rating').val(data.rating);
                $('#comment').val(data.comment);
                $('#is_approved').val(data.is_approved);
            }
        });
    });
});
</script>