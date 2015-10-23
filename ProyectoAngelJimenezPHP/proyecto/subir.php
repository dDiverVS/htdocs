<?php
$dir_destino = "img/";
$fichero_destino = $dir_destino . basename($_FILES["fichero"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($fichero_destino,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichero"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
        header("location: acceso.php");
    } else {
      
        $uploadOk = 0;
            header("location: acceso.php");
    }
}
// Check if file already exists
if (file_exists($fichero_destino)) {
    
    $uploadOk = 0;
        header("location: acceso.php");
}
// Check file size
if ($_FILES["fichero"]["size"] > 50000000000) {
  
    $uploadOk = 0;
        header("location: acceso.php");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  
    $uploadOk = 0;
    header("location: acceso.php");
}





// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Su fichero no se ha subido.";
// if everything is ok, try to upload file
} else {
    if (copy($_FILES["fichero"]["tmp_name"], $fichero_destino)) {
        
       
    }
}
?>