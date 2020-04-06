<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="">
<meta http-equiv="Reply-to" content="@.com">
<meta name="generator" content="PhpED 8.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="creation-date" content="09/06/2012">
<meta name="revisit-after" content="15 days">
<title>IMAGE IMPORT</title>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>


<style type="text/css">
	#container{
		width: 500px;
		height: 100%;
        margin:auto;
	}
</style>
</head>
<body>
    <div id="container" style="padding-top:80px;position:relative;">
        <h1>Please upload your PDF.</h1>
		<form action="filename.php" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="pdfname">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
                
            <button type="submit" class="btn btn-primary" role="button" aria-pressed="true">UPLOAD</button>
        </form>
		
	</div>
	<style type="text/css">
		h1{
            margin-bottom: 80px;
            text-align:center;
        }
		button{
            display:block !important;
            margin:auto;
            margin-top:40px;            
        }
		
	</style>
     
     
     

</body>
</html>