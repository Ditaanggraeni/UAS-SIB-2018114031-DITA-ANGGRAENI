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
            nama_mahasiswa: jQuery('#nama_mahasiswa').val(),
            alamat: jQuery('#alamat').val(),
            no_tlp: jQuery('#no_tlp').val(),
            email: jQuery('#email').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var mahasiswa_id = jQuery('#mahasiswa_id').val();
        var ajaxurl = 'mahasiswa';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var mahasiswa = '<tr id="mahasiswa' + data.id + '"><td>' + data.id + '</td><td>' + data.nama_mahasiswa + '</td><td>' + data.alamat + '</td><td>' + data.no_tlp + '</td><td>' + data.email + '</td>';
                if (state == "add") {
                    jQuery('#mahasiswa-list').append(mahasiswa);
                } else {
                    jQuery("#mahasiswa" + mahasiswa_id).replaceWith(mahasiswa);
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


    
   