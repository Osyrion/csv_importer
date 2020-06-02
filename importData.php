<?php
// Load the database configuration file
include_once 'config.php';

// UNIVERSAL PASSWORD FOR IMPORT FILE TO DB
$universal_password = "1234";

if($_POST && isset($_POST['action'])){

if ($_POST['action'] == 'EXPORT') {
    if ($_SERVER['REQUEST_METHOD']== "POST") {
        // CHECK FOR PASSWORD
        if ($_POST['password'] != $universal_password) {
            $qstring = '?status=nopass';
            header("Location: index.php".$qstring);
            exit();
        }

        // CHECK FOR FILE SIZE
        $file = $_FILES['file'];

        // MAX 5 MB
        if(isset($_FILES['file'])) {
            if($file['size'] > 5242880) { //5 MB (size is also in bytes)
                $qstring = '?status=filesize';
                header("Location: index.php".$qstring);
                exit();
            }
        }       
    }

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first data
            fgetcsv($csvFile);

            // Parse data from CSV file data by data
            while(($data = fgetcsv($csvFile, 1000, ";")) !== FALSE){

                // COLUMNS
                $amount = $data[33];

                // CHECKING IF AMOUNT IS NOT 0
                if ($amount != 0 && is_numeric($amount)) {

                    $payment_date = $data[13];
                    $comments = $data[11] . " " . $data[23] . " " . $data[24] . " " . $data[25];
                    $transaction_hash = sha1($data[8]);

                    // CHECK FOR DUPLICITY
                    if ($transaction_hash != NULL) {
                        if ($result = mysqli_query($link, "SELECT transaction_hash FROM csv_import WHERE transaction_hash = '$transaction_hash'"))
                        {
                            $check_hash = mysqli_num_rows($result);
                            mysqli_free_result($result);
                        }
                    }
                    else {
                        $check_hash = 1;
                    } 
                    
                    // CHECKING ENCODING
                    $check_encoding = mb_detect_encoding($comments, 'auto');

                    if (mb_check_encoding($comments, 'utf-8') == 'UTF-8') {

                        // USE THIS IF CSV IS ALREADY IN UTF-8
                        $comment = $comments;
                    }
                    else {

                        // CONVERT TO UTF-8
                        $comment = iconv($check_encoding, 'utf-8//TRANSLIT', $comments);
                    }
                
                    if ($check_hash == 0) {
                        $db->query("INSERT INTO CSV_IMPORT (transaction_hash, payment_date, amount, comment) VALUES ('$transaction_hash', '$payment_date', '$amount', '$comment')");
                    }
                }
                
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
            header("Location: output.php".$qstring);
            exit();
            
        }else{
            $qstring = '?status=err';
            header("Location: output.php".$qstring);
            exit();
        }
    }else{
        $qstring = '?status=invalid_file';
        header("Location: index.php".$qstring);
        exit();
    }

    // Redirect to the listing page
    header("Location: output.php".$qstring);
    exit();
}
else if ($_POST['action'] == 'EXPORTOVANÉ') {
    if ($_SERVER['REQUEST_METHOD']== "POST") {
    
        if ($_POST['password'] == $universal_password) {
            header("Location: output.php");
            exit();
        }
        else {
            $qstring = '?status=nopass';
            header("Location: index.php".$qstring);
            exit();
        }
    }
}
else {
    $qstring = '?status=err';
        header("Location: output.php".$qstring);
        exit();
}
}


?>