<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <h4><i class="fas fa-th-large"></i> Kelola Layanan</h4>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i> Tambah Layanan
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
                            <th width="15%">Gambar</th>
                            <th width="20%">Nama Layanan</th>
                            <th width="25%">Deskripsi</th>
                            <th width="15%">Harga</th>
                            <th width="10%">Status</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['services'])): ?>
                            <?php $no = 1; foreach ($data['services'] as $service): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <img src="<?= BASEURL; ?>/img/services/<?= $service['image']; ?>" 
                                             class="img-thumbnail" style="max-width: 100px;">
                                    </td>
                                    <td><?= $service['name']; ?></td>
                                    <td><?= substr($service['description'], 0, 80); ?>...</td>
                                    <td>Rp <?= number_format($service['price'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php if ($service['status'] == 'active'): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm tampilModalUbah" 
                                                data-id="<?= $service['id']; ?>" data-toggle="modal" data-target="#modalUbah">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= BASEURL; ?>/service/hapus/<?= $service['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data layanan</td>
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
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Layanan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/service/tambah" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
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
                <h5 class="modal-title"><i class="fas fa-edit"></i> Ubah Layanan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/service/ubah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Baru (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
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
            url: '<?= BASEURL; ?>/service/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#status').val(data.status);
            }
        });
    });
});
</script>