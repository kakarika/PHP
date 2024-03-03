<?php


require("../functions.php");
require("../database.php");
const BASE_PATH = __DIR__ . '/';
?>
<?php
if (!isLoggedIn()) {
    header('location: /sample%20project/notes/notes.php');
    exit();
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_POST['user_id'];
    echo $user_id;
    if (strlen($title) > 0 && strlen($body) > 0) {
        $query = $conn->prepare("INSERT INTO note (user_id,title, body) VALUES (?,?,?)");
        $query->bind_param("iss", $user_id, $title, $body);

        $query->execute();
        $query->close();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        $errors['body'] = "No valid inputs.";
    }
}
?>

<?php view('header.view.php'); ?>
<?php view('nav.view.php'); ?>
<?= $message ?? '' ?>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" required value="">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Body</label>
        <textarea name="body" class="form-control" id="body" required></textarea>
    </div>
    <div>
        <input type="hidden" value="<?php echo $_SESSION['user']['id'] ?>" name="user_id">
    </div>
    <?php if (!empty($errors)) : ?>
        <div><?= $errors['body'] ?></div>
    <?php endif; ?>
    <button type="submit" class="btn btn-info px-4 py-2">Create</button>
</form>

<?php view('footer.view.php'); ?>

<!DOCTYPE html>
<html lang="en">