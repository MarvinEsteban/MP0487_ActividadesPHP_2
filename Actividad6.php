<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = htmlspecialchars($_POST['number1']);
        $uploadOk = 1;

        // Verificar si se seleccionó un archivo
        if (isset($_FILES["fileToUpload"])) {
            // Creación del directorio y destino del archivo
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validar tipo de archivo
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "pdf") {
                echo "Sorry, only JPG, PNG & PDF files are allowed.<br>";
                $uploadOk = 0;
            }

            // Validar formato con el valor seleccionado
            if ($imageFileType != $_POST['filetype']) {
                echo "The file extension does not match the selected type.<br>";
                $uploadOk = 0;
            }

            // Validar tamaño del archivo
            if ($_FILES["fileToUpload"]["size"] > $number1) {
                echo "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            // Si se cumple todo lo anterior, enviar
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br> <br>";
                } else {
                    echo "Sorry, there was an error uploading your file.<br>";
                }
            } else {
                echo "Your file was not uploaded due to validation errors.<br>";
            }
        } else {
            echo "No file was selected for upload.<br>";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        Archivo <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
        Extensión <select type="text" id="files" name="filetype" size="3">
            <option value="jpg">jpg</option>
            <option value="pdf">pdf</option>
            <option value="png">png</option>
        </select> <br> <br>

        Tamaño MAX <input type="number" id="number1" name="number1">
        <input type="submit" value="UPLOAD" name="submit">

    </form>


</body>

</html>