<?php

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = $imageErr = "";
$name = $email = $comment = $gender = $website = $image = "";

$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "*Name is required";
    } else {
        $name = testInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z- ']*$/", $name)) {
            $nameErr = "*Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = testInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
        }
    }
    if (empty($_POST["email"])) {
        // $commentErr = "";
    } else {
        $comment = $_POST["comment"];
    }
    if (empty($_POST["gender"])) {
        $genderErr = "*Gender is required";
    } else {
        $gender = testInput($_POST["gender"]);
    }
    if (empty($_POST["website"])) {
        $websiteErr = "";
    } else {
        $website = testInput($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "*Invalid URL";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        if ((preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST["password"]) === 0)) {
            $passwordErr = "*Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
        } else {
            $password = $_POST["password"];
        }
    }
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Confirm password is required";
    } else {
        if ($_POST["confirmPassword"] !== $_POST["password"]) {
            $confirmPasswordErr = "*Password doesn't match";
        }
    }

    if (isset($_FILES["fileToUpload"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $imageErr = "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $imageErr = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $imageErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "git"
        ) {
            $imageErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded";
                $image = $target_file;
            }
        }
    }

    $comment = str_replace(array("\r", "\n"), '', $comment);

    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($imageErr)) {
        $data = fopen("user_data.txt", "a") or die("Validation failed!");
        fwrite($data, $name . "\n"  . $email . "\n"  . $website . "\n"  . $comment . "\n"  . $gender . "\n" . $image . "\n");
        fclose($data);
        $formSubmitted = true;
    }
}

$userData = fopen("user_data.txt", "r") or die("Unable to open file!");

$users = [];

while (!feof($userData)) {
    $user = [];
    $user['name'] = fgets($userData);
    $user['email'] = fgets($userData);
    $user['website'] = fgets($userData);
    $user['comment'] = fgets($userData);
    $user['gender'] = fgets($userData);
    $user['image'] = fgets($userData);

    if (!empty($user['name'])) {
        $users[] = $user;
    }
}

fclose($userData);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-control {
            border-color: blueviolet;
        }
    </style>
</head>

<body>
    <h1 class="text-center my-5">PHP Form Validation Example</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-5" enctype="multipart/form-data">
        <div class="w-25 m-auto">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control mb-2" value="<?php echo $name; ?>">
                <span class="error text-danger"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="<?php echo $email; ?>">
                <span class="error text-danger"><?php echo $emailErr; ?></span>
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" class="form-control mb-2" value="<?php echo $website; ?>">
                <span class="error text-danger"><?php echo $websiteErr; ?></span>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment" cols="40" rows="5" class="form-control mb-2"><?php echo $comment; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <div>
                    <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>>
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>>
                    <label for="female">Female</label>
                </div>
                <div>
                    <input type="radio" id="other" name="gender" value="other" <?php if (isset($gender) && $gender == "other") echo "checked"; ?>>
                    <label for="other">Other</label>
                </div>
                <span class="error text-danger"><?php echo $genderErr; ?></span>
            </div>
            <div class="form-group my-2">
                <span class="mt-3">Select image to upload:</span>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
                <span class="error text-danger"><?php echo $imageErr; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control mb-2">
                <span class="error text-danger"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control mb-2">
                <span class="error text-danger"><?php echo $confirmPasswordErr; ?></span>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" value="Submit" class="btn btn-info mt-2 w-50">
            </div>

        </div>
    </form>
    <div class="mb-5">
        <table class="table table-info table-striped table-hover table-borderless w-75 m-auto text-center">
            <thead>
                <tr>
                    <th class="col">Name</th>
                    <th class="col-3">Email</th>
                    <th class="col-3">Website</th>
                    <th class="col-3">Comment</th>
                    <th class="col">Gender</th>
                    <th class="col">Image</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['website'] ?></td>
                        <td><?php echo nl2br($user['comment']) ?></td>
                        <td><?php echo $user['gender'] ?></td>
                        <td>
                            <div class="" style="height: 100px;">
                                <img src="<?php echo $user['image']; ?>" class="w-100 h-100 object-fit-cover img-thumbnail shadow-md" alt="Uploaded Image">
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>