<?php
//% $_FILES
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live coding: php-filesystem</title>
</head>

<body>
    <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
        <input type="file" name="file-caricato">
        <button type="submit">Carica</button>
    </form>

    <?php
    //? Controllo metodo HTTP === POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //? Controllo file caricato senza errori
        if (isset($_FILES['file-caricato']) && $_FILES['file-caricato']['error'] == 0) {
            echo '<pre>';
            print_r($_FILES['file-caricato']);
            echo '</pre>';

            //* Raccolta informazioni
            $fileTmpPath = $_FILES['file-caricato']['tmp_name'];
            $fileName = $_FILES['file-caricato']['name'];
            $fileSize = $_FILES['file-caricato']['size'];
            $fileType = $_FILES['file-caricato']['type'];
            $fileNameArray = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameArray));

            /* echo '<pre>';
            print_r($fileNameArray);
            echo '</pre>'; */

            //echo $fileExtension = strtolower(end($fileNameArray));

            //* Limitare i tipi di file caricabili
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['file-caricato']['tmp_name']);
            finfo_close($finfo);

            $allowedMimeTypes = array('image/jpeg', 'image/png', 'application/pdf');
            if (!in_array($mime, $allowedMimeTypes)) {
                echo 'Caricamento non riuscito. I tipi di file permessi sono: '
                . implode(", ", $allowedMimeTypes);
                exit;
            }

            //* Creazione di un nuovo nome di file univoco
            //echo time() . $fileName . '<br>';
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            //echo $newFileName;


            //* Controllo cartella di destinazione
            $uploadFileDir = './uploads';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            //* Spostamento del file in ./uploads
            $dest_path = $uploadFileDir . '/' . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'Il file è stato caricato con successo.';
            } else {
                echo 'Si è verificato un errore durante lo spostamento del file nella directory di upload. Assicurati che la directory di upload sia scrivibile dal server web.';
            }
        } else {
            echo 'Si è verificato un errore nel caricamento del file.
            <br>Errore: ' . $_FILES['file-caricato']['error'];
        }
    }
    ?>
</body>

</html>