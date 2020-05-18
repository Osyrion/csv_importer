<?php
include_once 'config.php';
include_once 'importData.php';

?>


<!DOCTYPE html>
<html lang="cz">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href=<?php echo $dbHost . "/php/css/style.css" ?>>


    <title>Export CSV</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Datum platby</th>
                            <th>Částka</th>
                            <th>Popis</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Get rows
                    $result = $db->query("SELECT * FROM CSV_IMPORT ORDER BY id ASC");
                    $cnt = 0;
                        while($row = $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $row['payment_date']; ?></td>
                            <td><?php echo $row['amount'] . " Kč"; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                        </tr>
                    <?php $cnt++; } ?>
                    </tbody>
                </table>
                <?php 
                    if ($cnt == 0) {
                        echo "<p class='" . "alert alert-warning text-center" . "'>Žádné data!</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>