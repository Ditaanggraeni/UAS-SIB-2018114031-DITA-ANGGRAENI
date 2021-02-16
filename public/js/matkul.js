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
            nama_matakuliah: jQuery('#nama_matakuliah').val(),
            sks: jQuery('#sks').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var matkul_id = jQuery('#matkul_id').val();
        var ajaxurl = 'matkul';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var matkul = '<tr id="matkul' + data.id + '"><td>' + data.id + '</td><td>' + data.nama_matakuliah + '</td><td>' + data.sks + '</td>';
                if (state == "add") {
                    jQuery('#matkul-list').append(matkul);
                } else {
                    jQuery("#matkul" + matkul_id).replaceWith(matkul);
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