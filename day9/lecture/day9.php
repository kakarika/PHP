<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//create database

// $sql = "CREATE DATABASE php_project";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// $conn->close();

// sql to create table

// $sql = "CREATE TABLE php_project.guests(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(30) NOT NULL,
//     email VARCHAR(255),
//     register_date DATETIME DEFAULT CURRENT_TIMESTAMP
// )";

// $sql = "INSERT INTO php_project.guests (name,email)
// VALUES ('mgmg', 'mgmg@example.com');";

// $sql .= "INSERT INTO php_project.guests (name,email)
// VALUES ('zawzaw', 'zawzaw@example.com');";

// $sql .= "INSERT INTO php_project.guests (name,email)
// VALUES ('agag', 'agag@example.com');";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "New records created successfully.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $query = $conn->prepare("INSERT INTO php_project.guests (name, email) VALUES (?,?)");
// $query->bind_param("ss", $username, $email);

// $username = "John Doe";
// $email = "john@example.com";
// $query->execute();

// $username = "Mary";
// $email = "mary@example.com";
// $query->execute();

// echo "created successfully";

$blah = "DELETE FROM php_project.guests WHERE name='Mary'";
$conn->query($blah);
$sql = "SELECT * FROM php_project.guests ORDER BY name desc";
// $sql = "SELECT * FROM php_project.guests WHERE name='John Doe' ORDER";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table class='table w-75 m-auto text-center table-striped border mt-5 table-info table-hover'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Register date</th>
        </tr>
    </thead> <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td class='py-4'>{$row["id"]}</td>
            <td class='py-4'>{$row["name"]}</td>
            <td class='py-4'>{$row["email"]}</td>
            <td class='py-4'>{$row["register_date"]}</td>
        </tr>";
    }
    echo "</tbody>
</table>";
} else {
    echo "0 results";
}

// $query->close();
$conn->close();
?>
<!-- <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{$row["id"]}</th>
            <th>{$row["name"]}</th>
            <th>{$row["email"]}</th>
        </tr>
    </tbody>
</table> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

</body>

</html>