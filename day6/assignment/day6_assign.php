<?php
$titleErr = $bodyErr = "";
$title = $body = "";
$formSubmitted = false;
$notes = [];

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
        $data = fopen("notes.txt", "a");
        fwrite($data, $title . "\n" . $body . "\n");
        fclose($data);
        $formSubmitted = true;
    }
}

$noteData = fopen("notes.txt", "r") or die("file does not exist");
while (!feof($noteData)) {
    $note = [];
    $note["title"] = fgets($noteData);
    $note["body"] = fgets($noteData);

    if (!empty($note['title'])) {
        $notes[] = $note;
    }
}

function upper($note)
{
    $note['title'] = strtoupper($note['title']);
    $note['body'] = ucwords($note["body"]);
    return $note;
}

$finalNote = array_map("upper", $notes);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>day6</title>
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

    <h3 class="mt-5">Notes from file (in uppercase):</h3>
    <ul class="list-group">
        <?php foreach ($finalNote as $note) : ?>
            <li class="list-group-item"><?php echo $note['title'] . ": " . $note['body']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>