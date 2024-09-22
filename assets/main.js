$(document).ready(function () {
    let userTable = $('#users-table').DataTable({
        ajax: {
            url: "server_processing.php",
            type: "GET",
            async: true
        },
        processing: true,
        serverSide: true,
        lengthChange: false
    });

    const addFormModal = $('#userDataModal'),
        userForm = $("form#userDataForm");

    addFormModal.on('shown.bs.modal', function () {
        $(this).find('input[type=text]').filter(':visible:first').trigger('focus');
    })
    
    userForm.on("submit", function (e) {
        e.preventDefault();

        let formData = {
            name: $(this).find('#userName').val(),
            number: $(this).find('#userNumber').val(),
        };

        let $this = $(this);

        if ($this.data('requestRunning')) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: formData,
            dataType: "json",
            encode: true,
            beforeSend: function () {
                $this.addClass('loading');
            },
            success: function (resp) {
                $this.removeClass('loading');
                console.log(resp);
                if (resp.errors) {
                    $this.find('.frm-status').html('<div class="alert alert-danger" role="alert">All form fields are required!</div>');
                } else if (resp.success === true && !resp.errors) {
                    userTable.draw();
                    $this.trigger('reset');
                    $this.find('.frm-status').html('<div class="alert alert-success" role="alert">' + resp.message + '</div>');

                    setTimeout(function(){
                        addFormModal.modal('hide');
                        $this.find('.frm-status').html('');
                    },3000);
                } else {
                    $this.find('.frm-status').html('<div class="alert alert-secondary" role="alert">' + resp.message + '</div>');
                }
            },
            complete: function () {
                $this.data('requestRunning', false);
            },
            error: function (err) {
                console.log(err);
            }
        })
    });
});