<?php
require 'database.php';
$titleErr = $bodyErr = "";
$title = $body = "";
$formSubmitted = false;
$notes = [];

// $sql = "CREATE TABLE php_project.notes(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(255) NOT NULL,
//     body LONGTEXT,
//     register_date DATETIME DEFAULT CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "New records created successfully.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "title is required";
    } else {
        $title = $_POST["title"];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
    }

    if (empty($_POST["body"])) {
        $bodyErr = "body is required";
    } else {
        $body = $_POST["body"];
        $body = filter_var($body, FILTER_SANITIZE_STRING);
    }

    $body = str_replace(array("\r", "\n"), '', $body);

    if (empty($titleErr) && empty($bodyErr)) {
        $query = $conn->prepare("INSERT INTO php_project.notes (title, body) VALUES (?,?)");
        $query->bind_param("ss", $title, $body);

        $query->execute();
        $query->close();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

$sql = "SELECT * FROM php_project.notes";
$result = $conn->query($sql);

// $finalNote = array_map("upper", $notes);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>day8</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <h2 class="text-center mt-4">Notes</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="w-25 m-auto my-5">
        <div class="form-group my-3">
            <label for="title" class="mb-1">Title:</label>
            <input type="text" class="form-control" name="title" id="title">
            <span class="text-danger"><?php echo $titleErr ?></span>
        </div>
        <div class="form-group my-3">
            <label for="body" class="mb-1">Body:</label>
            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
            <span class="text-danger"><?php echo $bodyErr ?></span>
        </div>
        <div class="text-center"><input type="submit" value="Submit" class="btn btn-success w-25"></div>
    </form>

    <!-- <h3 class="mt-5">Notes from file (in uppercase):</h3>
    <ul class="list-group">
        <?php foreach ($finalNote as $note) : ?>
            <li class="list-group-item"><?php echo $note['title'] . ": " . $note['body']; ?></li>
        <?php endforeach; ?>
    </ul> -->

    <?php if ($result->num_rows > 0) { ?>
        <table class="table table-success table-striped border table-hover text-center w-75 m-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["body"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else {
        echo "No notes";
    }
    $conn->close(); ?>
</body>

</html>