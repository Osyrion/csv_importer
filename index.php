<?php 
session_start();
include 'controller.php';


// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

?>


<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href=<?php echo $basePath . "css/style.css" ?>>


    <title>Export CSV</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card rounded-lg border border-info shadow">
                <div class="card-header">
                    Export z CSV do HTML
                </div>
                <div class="card-body">
                    <form class="col-sm-10 offset-sm-1" action="importData.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="csvFile" lang="cz" accept=".csv" />
                                <label class="custom-file-label" for="csvFile" data-browse="Procházet">Vyberte CSV soubor</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="heslo" placeholder="Zadejte heslo" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="EXPORT" />
                        </div>
                    </form>
                    <!-- Display status message -->
                    <?php if(!empty($statusMsg)){ ?>
                    <div class="col-xs-12">
                        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>