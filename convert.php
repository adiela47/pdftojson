<?php
	include ( 'PdfToText.phpclass' ) ;

	function  output ( $message )
	   {
		if  ( php_sapi_name ( )  ==  'cli' )
			echo ( $message ) ;
		else
			echo ( nl2br ( $message ) ) ;
	    }

	$file	=  $_GET['pdfname'] ;
	$pdf	=  new PdfToText ( "upload/$file" ) ;

	echo '<!DOCTYPE html>
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
            <title></title>	
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <script type="text/javascript" src="assets/js/jquery.min.js"></script>		
		</head>
        <body>
            
            <button type="button" class="btn btn-warning" onclick="convertcolor(0)">Yellow</button>
            <button type="button" class="btn btn-danger" onclick="convertcolor(1)">Red</button>
           
            <button class="btn btn-primary convertbtn" onclick="getjson()">Get to JSON</button>
            <br>
            <button type="button" class="circle">x</button>
        ';   
	
    //output ( $pdf -> Text ) ;
    //echo (  $pdf -> Text  ) ;
    $arr = explode("\n",$pdf -> Text);
    for ($i=0; $i < count($arr); $i++) { 
        echo "<p onclick='TestSelection(event)'>".$arr[$i]."</p>";
    }

    echo '<script type="text/javascript">
            var arr1 = [], arr2 = [], arr = [];  
            var color="yellow";          
            function TestSelection (e) {
                if (window.getSelection) {  // all browsers, except IE before version 9
                    var selectionRange = window.getSelection ();                                        
                    var word = selectionRange.toString ();
                } 
                else {
                    if (document.selection.type == "None") {
                        alert ("No content is selected, or the selected content is not available!");
                    }
                    else {
                        var word = document.selection.createRange ();
                       
                    }
                }
                
                var string = e.target.innerHTML;
                
                if(string == word){
                    var str = e.target.parentNode.innerHTML;
                    
                    if(str.indexOf("<mark class=\"yellow\">"+word+"</mark>") != -1){
                        string = str.replace("<mark class=\"yellow\">"+word+"</mark>", word);
                        var index = arr1.indexOf(word);
                        arr1.splice(index,1);
                    }
                    else{
                        string = str.replace("<mark class=\"red\">"+word+"</mark>", word);
                        var index = arr2.indexOf(word);
                        arr2.splice(index,1);
                    }             
                    e.target.parentNode.innerHTML = string;

                }
                else{
                    if(color == "yellow"){
                        string = string.replace(word, "<mark class=\"yellow\">"+word+"</mark>");
                        arr1.push(word);
                    }
                    else{
                        string = string.replace(word, "<mark class=\"red\">"+word+"</mark>");
                        arr2.push(word);
                    }
                    
                    e.target.innerHTML = string;                               
                }  
                          
                
            }  
            
            function getjson(){
                
                var len1 = arr1.length, len2 = arr2.length;
                var len = (len1<=len2)?len1:len2;
                
                for(var i=0; i<len; i++){
                    var jsonArg1 = new Object();
                    jsonArg1[arr1[i]] = arr2[i];
                    
                    arr.push(jsonArg1);
                }   
                
                var myJsonString = JSON.stringify(arr);
                
                $("body").html(myJsonString);
            }
            function convertcolor(param){
                color = (param==0)?"yellow":"red";
                if(param == "0"){
                    $(".circle").css("background","#ff9f43");
                }     
                else{
                    $(".circle").css("background","#ea5455");
                }           
            }
            
        </script>
        <style type="text/css">
            body{
                padding:50px;
            }
            .red{
                background-color:red;
            }
            .yellow{
                background-color:yellow;
            }
            button{
                margin:20px 0;
            }
            .convertbtn{
                margin-left:20%;
            }
            .circle{
                border-radius:30px;
                width:30px;
                height:30px;
                color:transparent;
                background:#ff9f43;
                border:none;
                margin-top:10px;
               
            }
        </style>
        ';
    echo '</body></html>';
