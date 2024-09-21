<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Table</title>

        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    </head>
    <body>
        <h1>Data Table</h1>
        
        <div class="modal fade" id="userDataModal" tabindex="-1" aria-labelledby="userAddEditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="userModalLabel">Add New User</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form name="userDataForm" id="userDataForm">
                        <div class="modal-body">
                            <div class="frm-status"></div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="userName" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="userNumber" class="form-label">Number</label>
                                <input type="number" class="form-control" id="userNumber" placeholder="Enter a number" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table id="users-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>User’s Input</th>
                    <th>Fibonacci Number</th>
                </tr>
            </thead>
        </table>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

        <script>
            $( document ).ready(function() {
                let userTable = $('#users-table').DataTable({
                    ajax: {
                        url: "server_processing.php",
                        type: "GET",
                        async: true
                    },
                    processing: true,
                    serverSide: true,
                });

                const userForm = $("form#userDataForm");
                userForm.on( "submit", function(e) {
                    event.preventDefault();

                    let formData = {
                        name: $(this).find('#userName').val(),
                        number: $(this).find('#userNumber').val(),
                    };

                    if (formData.name && formData.number) {
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: formData,
                            dataType: "json",
                            encode: true,
                            beforeSend: function () {
                                //$this.addClass('loading');
                            },
                            success: function (resp) {
                                //$this.removeClass('loading');
                                // console.log('inside ajax', resp)
                                userTable.draw();
                                userForm.trigger('reset');
                            },
                            complete: function () {
                                //$this.data('requestRunning', false);
                            },
                            error: function (err) {
                                console.log(err);
                            }
                        })
                    }
                });
            });
        </script>
    </body>
</html>