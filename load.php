<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live coding: php-filesystem</title>
</head>

<body>
    <h2>Caricamento file</h2>
    <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="POST" enctype="multipart/form-data">
        <label for="file">Carica file</label>
        <input type="file" id="file" name="file-caricato">
        <button type="submit">Carica</button>
    </form>
    <?php
    //* Primo controllo. La richiesta dev'essere di tipo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //* Controlla se il file è stato caricato senza errori
        if (isset($_FILES['file-caricato']) && $_FILES['file-caricato']['error'] == 0) {

            //? Cosa contiene $_FILES['file-caricato']
            echo '<pre>';
            print_r($_FILES['file-caricato']);
            echo '</pre><br>';

            //* Raccolta informazioni
            $fileTmpPath = $_FILES['file-caricato']['tmp_name'];
            $fileName = $_FILES['file-caricato']['name'];
            $fileSize = $_FILES['file-caricato']['size'];
            $fileType = $_FILES['file-caricato']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            //* Controllo estensioni consentite
            $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'pdf');
            if (!in_array($fileExtension, $allowedfileExtensions)) {
                echo 'Caricamento non riuscito. I tipi di file permessi sono: ' . implode(", ", $allowedfileExtensions);
                exit;
            }

            //* Pulire nome del file e aggiunge un timestamp univoco per prevenire i conflitti di nome
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            //* Directory in cui il file verrà salvato
            $uploadFileDir = './uploaded_files/';
            $dest_path = $uploadFileDir . $newFileName;

            //* Creare la directory se non esiste
            /* if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $dest_path = $uploadFileDir . $newFileName; */

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'Il file è stato caricato con successo.';
            } else {
                echo 'Si è verificato un errore durante lo spostamento del file nella directory di upload. Assicurati che la directory di upload sia scrivibile dal server web.';
            }
        } else {
            echo 'Si è verificato un errore nel caricamento del file. Controlla l\'errore seguente.<br>';
            echo 'Errore:' . $_FILES['file-caricato']['error'];
        }
    }
    ?>
</body>

</html>