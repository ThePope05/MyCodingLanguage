<?php

$prg = true;
$fileName = readline("File name: ");

while ($prg == true) {

    if (readline("") == "") {

        $fileContent = file_get_contents($fileName, true);

        if ($fileContent != null) {
            $jsFileName = str_replace(".sw", ".js", $fileName);

            $newFileContent = str_replace("__", "function ", $fileContent);
            $newFileContent = str_replace("log", "console.log", $newFileContent);
            $newFileContent = str_replace("**", "document.querrySelectorAll", $newFileContent);
            $newFileContent = str_replace("*", "document.querrySelector", $newFileContent);
            //echo $newFileContent;

            unlink($jsFileName);
            $openFile = fopen($jsFileName, "w");
            fwrite($openFile, $newFileContent);
            fclose($openFile);
        } else {
            echo "No file found";
        }
    }
}
