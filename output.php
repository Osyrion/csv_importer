<?php
include_once 'config.php';

?>


<!DOCTYPE html>
<html lang="cz">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS STYLE -->
    <link rel="stylesheet" href="<?php echo $basePath . "/css/bootstrap.min.css"?>"> 
   
    <title>Export CSV</title>
</head>
<body>
    <div class="mt-2">
        <div class="ml-2">
            <div class="col-md-12">
                <table class="">
                    <thead class="strong">
                        <tr>
                            <th class="px-2">Datum (Date)</th>
                            <th class="px-2">Částka (Amount)</th>
                            <th class="px-2">Popis platby (Comment)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // GET DATA
                    $result = $db->query("SELECT * FROM CSV_IMPORT ORDER BY id ASC");
                    $cnt = 0;                    
                        while($row = $result->fetch_assoc()){
                            $numberAsString = number_format($row['amount'], 2, ",", " ");
                    ?>
                        <tr>
                            <td class="px-2"><?php echo $row['payment_date']; ?></td>
                            <td class="px-2"><?php echo $numberAsString . " Kč"; ?></td>
                            <td class="px-2"><?php echo $row['comment']; ?></td>
                        </tr>
                    <?php $cnt++; } ?>
                    </tbody>
                </table>
                <?php 
                    // IF THERE ARE NO DATA TO RENDER
                    if ($cnt == 0) {
                        echo "<p class='" . "alert alert-warning text-center" . "'>Žádné data!</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>