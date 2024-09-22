<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" type="text/css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Users List</h1>
            </div>
        </div>
    </div>
</header>

<main class="main-content">
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="add-user-feature">
                        <div class="add-button-outer">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userDataModal">Add a user</button>
                        </div>

                        <div class="modal fade" id="userDataModal" tabindex="-1" aria-labelledby="userAddEditModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="userModalLabel">Add New User</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </div>

                                    <div class="modal-body">
                                        <form name="userDataForm" class="userDataForm" id="userDataForm">
                                            <div class="">
                                                <div class="frm-status"></div>

                                                <div class="mb-3">
                                                    <label for="userName" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="userName" placeholder="Enter your name" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="userNumber" class="form-label">Number</label>
                                                    <input type="number" class="form-control" id="userNumber" placeholder="Enter a number" />
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="submit" class="submit-button btn btn-primary">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    <span class="submit-txt">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="users-list">
        <div class="container">
            <div class="row">
                <div class="col">                
                    <table id="users-table" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>User’s Input</th>
                            <th>Fibonacci Number</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="footer-copyright">
                    <?php $year = date('Y');
                     echo "©$year UserList. All rights reserved.";?>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="/assets/main.js"></script>

</body>
</html>