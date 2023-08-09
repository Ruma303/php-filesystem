<?php

//% Operazioni sui filesystem

//$ fopen()
//fopen('file1.txt', 'x');


//$ file_exists()
/* $file = 'file1.txt';
if(file_exists($file)) {
    echo "$file esiste. <br>"; // True
} else {
    echo "$file NON esiste. <br>";
} */


//$ filesize() + fread() + fclose()
/* $file = 'file1.txt';
if (file_exists($file)) {
    $handle = fopen($file, 'r');
    $contents = fread($handle, filesize($file));
    fclose($handle);
    echo $contents;
} else {
    echo "$file NON esiste. <br>";
} */


//$ file_get_contents()
/* $file = 'file1.txt';
if (file_exists($file)) {
    $contents = file_get_contents($file);
    echo $contents;
} else {
    echo "$file NON esiste. <br>";
} */


//$ readfile()
/* $file = 'file1.txt';
if (file_exists($file)) {
    readfile($file);
} else {
    echo "$file NON esiste. <br>";
} */


//$ file()
/* $lines = file('file1.txt');
foreach ($lines as $line_num => $line) {
    echo "Line #{$line_num} : " . htmlspecialchars($line) . "<br>";
} */


//$filetype($filename)
/* echo filetype('./file1.txt'); // file
echo filetype('./directory'); // dir */


//$ fwrite()
/* $file = fopen('file1.txt', 'a');
fwrite($file, "\nCodice scritto da fwrite()");
fclose($file); */


//$ file_put_contents()
//file_put_contents('file1.txt', "\nCodice scritto da file_put_contents()");
//file_put_contents('file1.txt', "\nCodice scritto da file_put_contents()", FILE_APPEND);


//$ rename()
/* if (rename("./file1.txt", "./file2.txt")) {
    echo "File rinominato con successo.";
} else {
    echo "Rinomina del file fallita.";
}
 */

//* $context
/* $context = stream_context_create(array('ftp' => array('overwrite' => true)));
if (rename("ftp://example.com/file1.txt", "ftp://example.com/file2.txt", $context)) {
    echo "File rinominato con successo.";
} else {
    echo "Rinomina del file fallita.";
}
 */


//$ unlink()
if (unlink("./file2.txt")) {
    echo "File eliminato con successo.";
} else {
    echo "Eliminazione del file fallita.";
}