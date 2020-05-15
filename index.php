<?php 
session_start();
include 'controller.php';
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
                    <form class="col-sm-10 offset-sm-1">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="csvFile" lang="cz" accept=".csv" />
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
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>