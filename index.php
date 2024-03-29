<?php

//% Operazioni sui filesystem

//, fopen()
// fopen('./file1.txt', 'x');


//, file_exists()
/* $file = 'file1.txt';
if(file_exists($file)) {
    echo "$file esiste. <br>"; // True
} else {
    echo "$file NON esiste. <br>";
}*/


//,  filesize() + fread() + fclose()
/* $file = 'file1.txt';
if (file_exists($file)) {
    $handle = fopen($file, 'r');
    $contents = fread($handle, filesize($file));
    fclose($handle);
    echo $contents;
} else {
    echo "$file NON esiste. <br>";
} */


//,  file_get_contents()
/* $file = 'file1.txt';
if (file_exists($file)) {
    $contents = file_get_contents($file);
    echo $contents;
} else {
    echo "$file NON esiste. <br>";
}
 */

//,  readfile()
/* $file = 'file1.txt';
if (file_exists($file)) {
    readfile($file);
} else {
    echo "$file NON esiste. <br>";
}
 */

//,  file()
/* $lines = file('file1.txt');
foreach ($lines as $line_num => $line) {
    echo "Line #{$line_num} : " . htmlspecialchars($line) . "<br>";
} */


//, filetype($filename)
/* echo filetype('./file1.txt'); // file
echo filetype('./directory'); // dir */


//,  fwrite()
/* $file = fopen('file1.txt', 'w');
fwrite($file, "\nNUOVO TESTO DI PROVA");
fclose($file);

readfile('file1.txt'); */


//,  file_put_contents()
// file_put_contents('file1.txt', "Codice scritto da file_put_contents()");
//file_put_contents('file1.txt', "\nCodice scritto da file_put_contents()", FILE_APPEND);



//,  rename()
/* if (rename("./directory/file1.txt", "./directory/ciao.txt")) {
    echo "File rinominato con successo.";
} else {
    echo "Rinomina del file fallita.";
} */


//* $context
/* $context = stream_context_create(array('ftp' => array('overwrite' => true)));
if (rename("ftp://example.com/file1.txt", "ftp://example.com/file2.txt", $context)) {
    echo "File rinominato con successo.";
} else {
    echo "Rinomina del file fallita.";
} */


//,  unlink()
/* if (unlink("./directory/ciao.txt")) {
    echo "File eliminato con successo.";
} else {
    echo "Eliminazione del file fallita.";
} */


//,  copy($source, $dest)
/* if (copy('./file1.txt', './directory/ciao.txt')) {
    echo 'File copiato con successo.';
} else {
    echo 'Copia del file fallita.';
} */


//,  is_file()
/* if (is_file('./file1.txt')) {
    echo 'È un file.';
} else {
    echo 'Non è un file.';
}
 */

//,  is_dir($filename)
/* if (is_dir('./directory')) {
    echo 'È una directory.';
} else {
    echo 'Non è una directory.';
}
 */

//,  scandir($dir)
/* $files = scandir('./');
echo '<pre>';
print_r($files);
echo '</pre><br>'; */


//,  pathinfo($path)
/* $info = pathinfo('./file1.txt');
echo '<pre>';
print_r($info);
echo '</pre><br>';
 */

//,  mkdir($pathname)
/* if (mkdir('./directory/')) {
    echo 'Directory creata con successo.';
} else {
    echo 'Creazione della directory fallita.';
} */


//,  rmdir()
/* if (rmdir('./directory')) {
    echo 'Directory rimossa con successo.';
} else {
    echo 'Rimozione della directory fallita.';
} */


//% Generatori
/* $filename = 'file1.txt';
function lines($filename) {
    $file = fopen($filename, 'r');
    while (($line = fgets($file)) !== false) {
        yield $line;
    }
    fclose($file);
}
foreach (lines($filename) as $line) {
    echo $line;
} */