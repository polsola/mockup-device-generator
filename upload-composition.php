<?php

namespace uploadComposition;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

use Classes\CompositionGenerator as CompositionGenerator;


$uploaddir = 'screens/';
$uploadedFiles = array();

$compositionGenerator = new CompositionGenerator();

foreach( $_FILES['file']['name'] as $key => $file ) {
    $uploadfile = $uploaddir . basename( $file );
    if( move_uploaded_file( $_FILES['file']['tmp_name'][$key], $uploadfile ) ) {
        // File is valid, and was successfully uploaded
        $uploadedFiles[] = basename(  $file  );
        if ($file === end($_FILES['file']['name'])) {
            echo $compositionGenerator->save( $uploadedFiles, $_POST['composition'] );
        }
    } else {
    // Some error happened, check permissions
        echo '<pre>';
        echo 'Here is some more debugging info:';
        print_r($_FILES);
        echo "</pre>";
    }
}
