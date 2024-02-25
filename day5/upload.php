<?php
if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "git"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded";
            $data = fopen("image_paths.txt", "a") or die("file not found");
            fwrite($data, $target_file . "\n");
            fclose($data);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$imageData = fopen("image_paths.txt", "r") or die("file not found");

$images = [];
while (!feof($imageData)) {
    $line = fgets($imageData);
    if (!empty($line)) {
        $images[] = trim($line);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="w-25 m-auto">
        <p class="my-3">Select image to upload:</p>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control my-3" required>
        <input type="submit" value="Upload Image" name="submit" class="btn btn-info">
    </form>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($images as $image) { ?>

                <div class="col-4 mb-4" style="height: 400px;">
                    <img src="<?php echo $image; ?>" class="w-100 h-100 object-fit-cover img-thumbnail shadow-md" alt="Uploaded Image">
                </div>

            <?php } ?>
        </div>
    </div>
</body>

</html>