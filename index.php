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
        new DataTable('#users-table', {
            ajax: 'server_processing.php',
            processing: true,
            serverSide: true
        });
    </script>
</body>
</html>