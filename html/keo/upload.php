<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload to T-Share</title>
  <link rel="stylesheet" type="text/css" href="/pub/css/keo/upload/style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="/pub/js/keo/upload/index.js" type="text/javascript"></script>

</head>
<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  include(dirname(__FILE__)."\..\header\index.php");
?>
<body>
<div class="container"> <br />

 <div class="row">
  <div class="col-md-6 col-md-offset-3" style="position: relative; margin-top: 100px">
    <div class="panel panel-default">
     <div class="panel-heading"><strong> Upload files </strong></div>
     <div class="panel-body">
       <div class="form-group">
         <label for="document-name">Name of Document:</label>
         <input type="text" class="form-control" id="document-name" placeholder="">
       </div>

      <form role="form_type">
        <div class="form-group">
          <label for="sel1">Select Type (select one):</label>
          <select class="form-control" id="sel1">
            <option value="Technology">Technology</option>
            <option value="Education">Education</option>
            <option value="Mobile">Mobile</option>
            <option value="Photograph">Photograph</option>
            <option value="Food">Food</option>
            <option value="Bussiness">Bussiness</option> <br>
          </select>

        </div>
      </form>
      <br>

      <form role="form_comment">
        <div class="form-group">
          <label for="comment">Description:</label>
          <textarea class="form-control" rows="4" id="comment"></textarea>
        </div>
      </form>			

      <div class="kv-main">
        <form enctype="multipart/form-data">
          <div class="form-group">
            <input id="file-5" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
          </div>
        </form>
        <br>
      </div>		

           </div>
         </div>
       </div>
     </div>

   </div>
 </div>
</body>
</html>