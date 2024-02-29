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

$sql = "SELECT * FROM php_project.guests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead> <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
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