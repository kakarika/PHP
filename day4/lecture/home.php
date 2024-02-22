<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="menu">
        <?php include 'menu.php'
        ?>
    </div>
    <h2>welcome to home page</h2>
    <h3>blah blah blah blah</h3>

    <!-- <?php
            require 'vars.php';
            echo "I have a $color $car";
            ?> -->

    <!-- <?php
            //  readfile('webdictionary.txt') 
            $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file");
            // echo fread($myfile, filesize("webdictionary.txt"));
            while (!feof($myfile)) {
                echo fgets($myfile) . "<br>";
                // echo fgetc($myfile) . "<br>";
            }
            fclose($myfile);
            ?> -->

    <?php
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $txt = "\nHTML&CSS\n";
    fwrite($myfile, $txt);
    // $txt = "Orange\n";
    // fwrite($myfile, $txt);
    fwrite($myfile, "PHP\n");
    fwrite($myfile, 'Laravel');
    fclose($myfile);
    $file = fopen("newfile.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    ?>

    <?php include "footer.php" ?>
</body>

</html>