const BASEURL = 'http://pertemuan2/Tugas/MVC/public';

$(document).on('click', '.tampilModalUpdate', function() {
    $('#formModalLabel').html('Ubah Data Mahasiswa');
    $('#btnSubmit').html('Ubah Data');
    $('.modal-body form').attr('action', BASEURL + '/mahasiswa/update');

    const id = $(this).data('id');

    $.ajax({
        url: BASEURL + '/mahasiswa/getUpdate',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            $('#nama').val(data.nama);
            $('#nrp').val(data.nrp);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);
            $('#id').val(data.id);
        }
    });
});
