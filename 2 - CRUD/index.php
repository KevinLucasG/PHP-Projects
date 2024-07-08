<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $servename = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                // Create connection
                $conn = new mysqli($servename, $username, $password, $database);

                //Check connection
                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error);
                }

                // read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }
                // read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]/td>
                    <td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$row[id]' role='button'>Edit</a>

                        <a class='btn btn-sm btn-danger' href='delete.php?id=$row[id]' role='button'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>


</html>