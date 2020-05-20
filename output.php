<?php
include_once 'config.php';

?>

<table id="tablepress-1" class="tablepress tablepress-id-1">
    <thead>
        <tr class="row-1 odd">
            <th class="column-1">Datum (Date)</th><th class="column-2">Částka (Amount)</th><th class="column-3">Popis platby (Comment)</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // GET DATA
    $result = $db->query("SELECT * FROM CSV_IMPORT ORDER BY id ASC");
    $cnt = 0;
    $numRow = 2;               
        while($row = $result->fetch_assoc()){
            $numberAsString = number_format($row['amount'], 2, ",", " ");
    ?>
    <tr <?php echo ('class="row-' . $numRow++); if ($numRow % 2 == 0) { echo " odd" . '"'; } else {echo " even" . '"';} ?>>
            <td class="column-1"><?php echo $row['payment_date']; ?></td><td class="column-2"><?php echo $numberAsString . " Kč"; ?></td><td class="column-3"><?php echo $row['comment']; ?></td>
        </tr>
    <?php $cnt++; } ?>
    </tbody>
</table>
<?php 
    // IF THERE ARE NO DATA TO RENDER
    if ($cnt == 0) {
        echo "<p>Žádné data!</p>";
    }
?>
</body>
</html>