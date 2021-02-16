jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            waktu_absen: jQuery('#waktu_absen').val(),
            mahasiswa_id: jQuery('#mahasiswa_id').val(),
            matakuliah_id: jQuery('#matakuliah_id').val(),
            keterangan: jQuery('#keterangan').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var absen_id = jQuery('#absen_id').val();
        var ajaxurl = 'absen';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var absen = '<tr id="absen' + data.id + '"><td>' + data.id + '</td><td>' + data.waktu_absen + '</td><td>' + data.mahasiswa_id + '</td><td>' + data.matakuliah_id + '</td><td>' + data.keterangan + '</td>';
                if (state == "add") {
                    jQuery('#absen-list').append(absen);
                } else {
                    jQuery("#absen" + absen_id).replaceWith(absen);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

    