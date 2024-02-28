<?php
include 'FormValidator.php';

$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = "";
$name = $email = $comment = $gender = $website = "";

$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new FormValidator($_POST);

    if ($validator->validate()) {
        $name = $validator->getName();
        $email = $validator->getEmail();
        $comment = $validator->getComment();
        $gender = $validator->getGender();
        $website = $validator->getWebsite();
    } else {
        $errors = $validator->getErrors();
        $nameErr = $errors["name"] ?? "";
        $emailErr = $errors["email"] ?? "";
        $websiteErr = $errors["website"] ?? "";
        $genderErr = $errors["gender"] ?? "";
        $passwordErr = $errors["password"] ?? "";
        $confirmPasswordErr = $errors["confirmPassword"] ?? "";
    }

    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $formSubmitted = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-control {
            border-color: blueviolet;
        }
    </style>
</head>

<body>
    <h1 class="text-center my-5">PHP Form Validation Example</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="">
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
            <div class="text-center my-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-info mt-2 w-50">
            </div>
            <?php if ($formSubmitted) { ?>
                <div class="alert alert-success" role="alert">
                    You are logged in!!!
                </div>
            <?php } ?>
        </div>
    </form>
</body>

</html>