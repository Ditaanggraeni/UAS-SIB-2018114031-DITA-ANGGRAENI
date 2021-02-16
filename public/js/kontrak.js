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
            mahasiswa_id: jQuery('#mahasiswa_id').val(),
            semester_id: jQuery('#semester_id').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var kontrak_id = jQuery('#kontrak_id').val();
        var ajaxurl = 'kontrak';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var kontrak = '<tr id="kontrak' + data.id + '"><td>' + data.id + '</td><td>' + data.mahasiswa_id + '</td><td>' + data.semester_id + '</td>';
                if (state == "add") {
                    jQuery('#kontrak-list').append(kontrak);
                } else {
                    jQuery("#kontrak" + kontrak_id).replaceWith(kontrak);
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