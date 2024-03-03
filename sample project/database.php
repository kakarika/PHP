<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_project';

//mysqli_report(MYSQLI_REPORT_OFF);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die("error");
}

if (!mysqli_select_db($conn, $dbname)) {
    die("can not select db.");
}

// $sql = "CREATE TABLE users(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(255) NOT NULL,
//     email VARCHAR(50),
//     password VARCHAR(50),
//     create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     update_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     delete_date DATETIME DEFAULT CURRENT_TIMESTAMP
// )";

// $conn->query($sql);

// $sql_todos = "CREATE TABLE todos (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT(6) UNSIGNED,
//     body TEXT,
//     create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     update_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     delete_date DATETIME DEFAULT CURRENT_TIMESTAMP
//         -- FOREIGN KEY (user_id) REFERENCES php_project.users(id)
// )";

// $sql_notes = "CREATE TABLE note (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id INT(6) UNSIGNED,
//     title VARCHAR(255),
//     body TEXT,
//     create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     update_date DATETIME DEFAULT CURRENT_TIMESTAMP,
//     delete_date DATETIME DEFAULT CURRENT_TIMESTAMP
//         -- FOREIGN KEY (user_id) REFERENCES php_project.users(id)
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }


// if (mysqli_query($conn, $sql_todos)) {
//     echo "Table 'todos' created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// if (mysqli_query($conn, $sql_notes)) {
//     echo "Table 'notes' created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// $conn->close();
