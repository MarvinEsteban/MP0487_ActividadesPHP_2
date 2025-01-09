<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise4</title>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Revisar si se envía
    if (isset($_FILES["fileToUpload"])) {
        // Define directorio
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Subir archivo
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was selected for upload.";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
    <input type="submit" value="Upload" name="submit"> <br>
</form>

</body>
</html>
