<?php


require("../functions.php");
require("../database.php");

?>
<?php
if (!isLoggedIn()) {
    header('location: /sample%20project/auth/login.php');
    exit();
}
$user_id = $_SESSION['user']['id'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] ?? '' === "DELETE") {
        $id = $_POST['id'];
        $delete_query = sprintf(
            "DELETE FROM `todos` WHERE id = %d AND user_id=%d",
            mysqli_real_escape_string($conn, $id),
            mysqli_real_escape_string($conn, $user_id)
        );

        $result = mysqli_query($conn, $delete_query);
    } else {
        $body = $_POST['body'];

        $insert = sprintf(
            "INSERT INTO `todos` (`body`, `user_id`) VALUES ('%s', %d)",
            mysqli_real_escape_string($conn, $body),
            mysqli_real_escape_string($conn, $user_id)
        );

        $result = mysqli_query($conn, $insert);
    }
}

$query_string = sprintf(
    "SELECT * FROM todos WHERE user_id = %d ORDER BY id DESC",
    mysqli_real_escape_string($conn, $user_id)
);

$result = mysqli_query($conn, $query_string);

?>
<?php require("../view/header.view.php"); ?>
<?php require("../view/nav.view.php");
const BASE_PATH = __DIR__ . '/'; ?>
<div>
    <form action="/sample%20project/todos/todos.php" method="POST" class="d-flex mt-4">
        <input type="text" name="body" class="form-control w-25" />
        <button name="add-todo-btn" type="submit" class="btn btn-info px-4">Add</button>
    </form>
</div>
<div class="mt-5">
    <table class="table table-info table-striped table-borderless">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div>
                <tr class="">
                    <td><?= htmlentities($row['body']) ?></td>
                    <td class="text-end">
                        <form action="/sample%20project/todos/todos.php" method="POST">
                            <input type="hidden" name="id" value=<?= $row['id'] ?> />
                            <input type="hidden" name="action" value="DELETE" />
                            <button class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>

            </div>
        <?php endwhile; ?>
    </table>
</div>
<?php require("../view/footer.view.php"); ?>