<?php
//% $_FILES
/* echo '
<pre>';
print_r($_FILES);
echo '</pre>'; */
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live coding: php-files</title>
</head>
<body>
    <form method="post" action=<?php echo $_SERVER['PHP_SELF']
        ?> enctype="multipart/form-data">
        <input type="file" name="file1">
        <button type="submit" name="file-caricato" value="File caricato">
            Carica</button>
    </form> -->

    <?php
    //* Info sul file caricato
    /* echo '<pre>';
    print_r($_FILES);
    echo '</pre>'; */

    /* if (isset($_POST['file-caricato'])) {
        print_r($_POST);
        echo "<h2>{$_POST['file-caricato']}</h2>";

        //*  Percorso in cui il file caricato sarà salvato, nella cartella /uploads.
        $uploadedPath = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
        echo 'Percorso file caricato: <i>' . $uploadedPath . '</i><br><br>';

        //* Controlla se la cartella 'uploads' esiste. Se non esiste, viene creata.
        if (!is_dir($uploadedPath)) {
            mkdir($uploadedPath, 0755);
        }

        //* Spostamento del file
        $uploadedImage = $uploadedPath . '/' . $_FILES['file1']['name'];
        $tmpFile = $_FILES['file1']['tmp_name'];
        move_uploaded_file($tmpFile, $uploadedImage);

        //* Debugging
        $result = <<<"RESULT"
        Il file <strong> {$_FILES['file1']['name']} </strong>
        è stato spostato al percorso: <br><i>$uploadedImage</i>
        RESULT;
        echo $result;
    }  */?>
</body>
</html>