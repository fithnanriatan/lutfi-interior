<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <h4><i class="fas fa-images"></i> Kelola Portfolio</h4>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i> Tambah Portfolio
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
                            <th width="25%">Nama Project</th>
                            <th width="30%">Deskripsi</th>
                            <th width="15%">Kategori</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['portfolios'])): ?>
                            <?php $no = 1; foreach ($data['portfolios'] as $portfolio): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <img src="<?= BASEURL; ?>/img/portfolios/<?= $portfolio['image']; ?>" 
                                             class="img-thumbnail" style="max-width: 100px;">
                                    </td>
                                    <td><?= $portfolio['project_name']; ?></td>
                                    <td><?= substr($portfolio['description'], 0, 100); ?>...</td>
                                    <td><span class="badge badge-primary"><?= $portfolio['category']; ?></span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm tampilModalUbah" 
                                                data-id="<?= $portfolio['id']; ?>" 
                                                data-toggle="modal" data-target="#modalUbah">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= BASEURL; ?>/portfolio/hapus/<?= $portfolio['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data portfolio</td>
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
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Portfolio</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/portfolio/tambah" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Project <span class="text-danger">*</span></label>
                        <input type="text" name="project_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="F&B">F&B</option>
                            <option value="Office">Office</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
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
                <h5 class="modal-title"><i class="fas fa-edit"></i> Ubah Portfolio</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= BASEURL; ?>/portfolio/ubah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Project <span class="text-danger">*</span></label>
                        <input type="text" name="project_name" id="project_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="F&B">F&B</option>
                            <option value="Office">Office</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar Baru (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
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
            url: '<?= BASEURL; ?>/portfolio/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#project_name').val(data.project_name);
                $('#description').val(data.description);
                $('#category').val(data.category);
            }
        });
    });
});
</script>