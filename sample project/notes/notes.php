<?php


require("../functions.php");
require("../database.php");
const BASE_PATH = __DIR__ . '/';
?>

<?php
$select_query = "SELECT title, note.id AS note_id, body, users.id AS user_id, username FROM note LEFT JOIN users ON note.user_id = users.id";
$results = mysqli_query($conn, $select_query);
?>
<?php view("header.view.php", [
    "title" => "Notes"
]); ?>
<?php view("nav.view.php"); ?>
<h1 class="text-center">Notes</h1>
<div class="text-end">
    <a href="/sample%20project/notes/note-create.php"><button class="btn btn-info my-4 px-5 py-2">Create note</button></a>
</div>
<div class="d-flex flex-wrap">
    <?php while ($row = mysqli_fetch_assoc($results)) : ?>
        <div class="card bg-success text-white m-3" style="width: 18rem;">
            <div class="card-body">
                <h3 class="mb-3"><?= $row["title"] ?></h3>
                <h6 class="card-subtitle mb-4 text-body-secondary"> Author - <?= $row["username"] ?? "Unknown" ?></h6>
                <p>
                    <?= substr(htmlentities($row["body"]), 0, 200) . '...' ?>
                </p>
                <a href="/sample%20project/notes/note-edit.php?id=<?= $row["note_id"] ?>" class="card-link"><button class="btn btn-warning">Edit note</button></a>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php view("footer.view.php"); ?>