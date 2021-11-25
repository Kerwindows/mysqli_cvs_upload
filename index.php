<?php 

include("import_csv.php");

$import_csv = new ImportCSV();
if (isset($_POST['import_csv'])) {
$import_csv->import($_FILES['file']['tmp_name']);
}
?>

<html>

<head>
	<title>GeeksforGeeks</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			<h4>Import CSV file</h4>
			<form method="post" class="" enctype="multipart/form-data">
				<div class="input-group mb-2">
					<input type="file" class="form-control" accept=".csv" name="file" required="required">
					<button type="submit" class="btn btn-sm btn-success" type="submit" name="import_csv" value="Import">Import</button>
				</div>
			</form>
		</div>
	</div>
	<!-- script to prevent resubmission-->
	<script>
	if(window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
	</script>
</body>

</html>
