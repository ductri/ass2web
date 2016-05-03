<!DOCTYPE html>
<html>
<head>
	<title>Lab_12</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script>
		function insertItem(){
			var id = $("#Id").val(); //Lấy giá trị hiện tại của thành phần, hoặc thay đổi giá trị cho thành phần. Lay gia tri dau tien neu thanh phan chon la 1 danh sach.
			var name = $("#nameCar").val();
			var year = $("#yearCar").val();
			var dataInsert = {add: 1, id: id, name: name, year: year};

			$.ajax({
				type: "GET",
				url: "model.php",
				data: dataInsert,
				success: function(d){
					var data = JSON.parse(d)
					
					if (data.success == true) {
						reloadRecords();
					} else {
						$("#Error").prop("innerHTML",data.error);
					}		        
				}
			});
		}

		function deleteItem(){
			var id = $("#Id").val();
			var dataDelete = {del: 1, id: id};
			$.ajax({
				type: "GET",
				url: "model.php",
				data: dataDelete,
				success: function(res){
					var data = JSON.parse(res)
					
					if (data.success) {
						reloadRecords();
						$("#Error").prop("innerHTML", data.notice);
					} else {
						$("#Error").prop("innerHTML", data.error);
					}  
				}
			});
		}

		function updateItem() {
			var id = $("#Id").val();
			var name = $("#nameCar").val();
			var year = $("#yearCar").val();
			var dataUpdate = {edit: 1, id: id, name: name, year: year};

			$.ajax({
				type: "GET",
				url: "model.php",
				data: dataUpdate,
				success: function(results){
					var data = JSON.parse(results)
					
					if (data.success) {
						reloadRecords();
						$("#Error").prop("innerHTML", data.notice);
					} else {
						$("#Error").prop("innerHTML", data.error);
					}
				}
			});
		}

		function reloadRecords(){
			var dataReload = {retrieve: 1};
			$.ajax({
				type: "GET",
				url: "model.php",
				data: dataReload,
				success: function(dataS){
					var data = JSON.parse(dataS)
					
					$("#myTable").prop("innerHTML", "");
					for (var i = 0; i < data.length; i++) {
						$("<tr/>").append($("<td/>",{text: data[i].id})).
						append($("<td/>",{text: data[i].name})).
						append($("<td/>",{text:data[i].year})).
						appendTo($("#myTable"));
					}
				}
			});
		}

	</script>
</head>
<body>
	<?php
		$username = "root";
		$password = "";
		$hostname = "localhost";

		//connect to the database
		$dbhandle = mysqli_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
		//Select database to word with it
		$selected = mysqli_select_db( $dbhandle,"examples") or die("Could not select examples");
	?>

	<div class="container">
		<form class="form-horizontal" role="form" method="Post" name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h1 style ="text-align: center">
				<span class="label label-info">My SQL</span>
			</h1>
			<br>
			<table class="table table-striped" id = "myTable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Year</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$result = mysqli_query($dbhandle,"SELECT * FROM cars");
					while ($row = mysqli_fetch_array($result)) {
						echo 
							"<tr>".
							"<td>".$row{'id'}."</td>".
							"<td>".$row{'name'}."</td>".
							"<td>".$row{'year'}."</td>".
							"</tr>";
					}
					?>
				</tbody>
			</table>
			<div>
				<input type="button" id = "insert" value="INSERT" onClick = "insertItem()" class="btn btn-success">
				<input type="button" id = "update" value="UPDATE" onclick = "updateItem()" class="btn btn-success">
				<input type="button" id = "delete" value="DELETE" onclick= "deleteItem()" class="btn btn-success">
			</div>
			<h3 style="text-align: center">
				<span class="lable lable-primary">FORM INSERT / UPDATE </span>
			</h3> <br>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">ID: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="Id" name="IdCar" placeholder="ID of the car" value="">
				</div>
			</div>
			<div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nameCar" name="nameCar" placeholder="Name of the car" value="">
                    </div>
            </div>
            <div class="form-group">
                <label for="year" class="col-sm-2 control-label">Year: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="yearCar" name="yearCar" placeholder="Year of the car" value="">
                    </div>
            </div>
            <h4 id= "Error" style="text-align: center">
            	<span class="label label-danger">HOANG PHUOMG</span>
            </h4>
		</form>
	</div>
</body>
</html>