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
            semester: jQuery('#semester').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var semester_id = jQuery('#semester_id').val();
        var ajaxurl = 'semester';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var semester = '<tr id="semester' + data.id + '"><td>' + data.id + '</td><td>' + data.semester + '</td>';
                if (state == "add") {
                    jQuery('#semester-list').append(semester);
                } else {
                    jQuery("#semester" + semester_id).replaceWith(semester);
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