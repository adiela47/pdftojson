<?php    
  if (isset($_FILES['pdfname']) && $_FILES['pdfname']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['pdfname']['tmp_name'];
    $fileName = $_FILES['pdfname']['name'];
    $fileSize = $_FILES['pdfname']['size'];
    $fileType = $_FILES['pdfname']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedfileExtensions = array('pdf');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        $uploadFileDir = './upload/';
        $dest_path = $uploadFileDir . $fileName;
        
        if(move_uploaded_file($fileTmpPath, $dest_path))
        {
           //echo "<script>alert('image is successfully uploaded.');document.location='./';</script>";
           header( "Location: convert.php?pdfname=$fileName" );
           exit ;
        }
        else
        {
           // $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
           echo "<script>alert(There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');document.location='./';</script>";
        }
        
    }
    }
?>