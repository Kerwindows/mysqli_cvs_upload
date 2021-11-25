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
      <div class=""> <span class=""><p class="">Upload User List</p>
                          <input  type="file" name="file" required="required" />
                          </span>
      </div>
      <div class="">
        <button type="submit" class="" type="submit" name="import_csv" value="Import">Import</button>
    </form>
  </body>
</html>
