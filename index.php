<?php 

include_once 'config.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success text-center';
            $statusMsg = 'Data byly úspěšne importovány!';
            break;
        case 'err':
            $statusType = 'alert-danger text-center';
            $statusMsg = 'Objevil se problém. Zkuste znova!';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger text-center';
            $statusMsg = 'Vyberte prosím validní CSV soubor.';
            break;
        case 'nopass':
            $statusType = "alert-danger text-center";
            $statusMsg = 'Zadejte správne heslo!';
            break;
        case 'filesize':
            $statusType = "alert-danger text-center";
            $statusMsg = 'Soubor je příliš velký!';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}

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
                                <input type="file" name="file" class="custom-file-input" id="csvFile" aria-describedby="csvFile" accept=".csv" onMouseOut="Upload()" />
                                <label class="custom-file-label" for="csvFile" data-browse="max 5 MB">Vyberte CSV soubor</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="universalusername" name="universalusername" value="universalusername">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Zadejte heslo" name="password" />
                        </div>
                        <div class="form-group">
                            <div class="btn-group btn-block" role="group" aria-label="export group">
                                <input type="submit" class="btn btn-success col-sm-6" value="EXPORTOVANÉ" name="action" />
                                <input type="submit" class="btn btn-primary col-sm-6" value="EXPORT" name="action" id="submit" />
                            </div>
                        </div>
                    </form>
                    <!-- Display status message -->
                    <?php if(!empty($statusMsg)){ ?>
                    <div class="col-sm-10 offset-sm-1">
                        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
                    </div>
                    
                    <?php } ?>
                    <div class="col-sm-10 offset-sm-1">
                        <div class="d-none" id="fileSizeToggle">
                            <div class="alert alert-danger text-center">Soubor je příliš velký!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("csvFile").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })

    function Upload() {
        const input = document.getElementsByName('action');
        var fileUpload = document.getElementById("csvFile");
        if (typeof (fileUpload.files) != "undefined") {
            var size = parseFloat(fileUpload.files[0].size / 1024 / 1024).toFixed(2);
            if (size > 2) {
                input[0].disabled = true;
                input[1].disabled = true;
                document.getElementById("fileSizeToggle").className = 'd-block';
            } 
            else {
                input[0].disabled = false;
                input[1].disabled = false;
                document.getElementById("fileSizeToggle").className = 'd-none';
            }
            
        } 
    }
</script>

</body>
</html>