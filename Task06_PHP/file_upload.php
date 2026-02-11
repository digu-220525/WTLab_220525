<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
            echo"hi";
                $target_fold = "uploads/";
                $fileName = $_FILES['filename']['name'];
                echo"<br>_FILES['filename']['name'] = ".$fileName;
                $tmpName = $_FILES['filename']['tmp_name']; 
                echo"<br>_FILES['filename']['tmp_name'] =".$tmpName;
                $targeFiletPath = $target_fold.basename($fileName);
                echo "<br>target_fold.basename($fileName) = $targeFiletPath";

                // $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // $types = ['jpg','pdf','png','txt'];
                // if (!in_array($fileType,$types)){
                //     echo "<h2>Enter Valid File</h2>";
                // }

                if(move_uploaded_file($tmpName,$targeFiletPath)){
                    echo "<br>Succesfull";
                    echo "<br><a href='download.php?file=$fileName'>Download file</a>";
                }
                else{
                    echo"<br>fail";
                }
                

        
    ?>

</body>
   
</html>
