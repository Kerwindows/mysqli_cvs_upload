<?php 
include("import_csv.php");

$import_csv = new ImportCSV();

if (isset($_POST['import_csv'])) {
$import_csv->import($_FILES['file']['tmp_name']);
}
?>

<html>
  <body>
    <form method="post" enctype="multipart/form-data">
      <div class="info-box-content "> <span class="info-box-text"><p class="">Upload User List</p>
                          <input  type="file" name="file" required="required" />
                          </span> </div>
      <div class="btn-group pull-right">
        <button type="submit" class="btn btn-sm btn-success " type="submit" name="import_csv" value="Import">Import</button>
        <!--<input class="btn btn-success pull-right" type="submit" name="sub" value="Import" />-->
    </form>
  </body>
</html>
