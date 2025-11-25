$(function () {

    $('.tombolTambahData').on('click', function(){
        
        $('.modal-body form').attr('action', '')
        $('#formModalLabel').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Tambahkan')
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah')

        $('#id').val(null)
        $('#nama').val(null)
        $('#nip').val(null)
        $('#email').val(null)
        $('#jurusan').val('RPL')
            
    })


    $('.tombolUbahData').on('click', function(){
        
        $('#formModalLabel').html('Ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Ubah')
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah')

        const id = $(this).data('id')

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id)
                $('#nama').val(data.nama)
                $('#nip').val(data.nip)
                $('#email').val(data.email)
                $('#jurusan').val(data.jurusan)
            }
        })

    })

})