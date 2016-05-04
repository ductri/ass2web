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
              <input type="text" class="form-control" id="name" placeholder="Filename" required>
            </div>



            <form role="form_type" name="formSelect">
              <div class="form-group" name="Select">
                <label for="sel1">Select Type of Template:</label>
                <select class="form-control" id="mySelect" name="mySelect">
                  <br>
                </select>
              </div>
            </form>
            <br>



            <form role="form_comment">
              <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="4" id="description" placeholder="Please input description..." required></textarea>
              </div>
            </form>			

            <div class="kv-main">
              <form enctype="multipart/form-data">
                <div class="form-group">
                  <input id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
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

<script type="text/javascript">

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/topic/get",
  "method": "GET",
  "dataType": "json"
}

$.ajax(settings).done(function (response) {

  for (var i = 0; i < response.length; ++i) {
          $('#mySelect').append(
              $('<option />')
                  .text(response[i].name)
                  .val(response[i].topicid)
          );
          
      }
      //console.log($('#mySelect :selected').text());
      //console.log($('#mySelect').val());
});





</script>

</body>
</html>