<?php
class ImportCSV extends mysqli
{
    private $state_csv = false;
    public function __construct()
    {
        parent::__construct("localhost", "necrodrow_scancheck", "9276FAKISLF", "necrodrow_scancheck");
        if ($this->connect_error)
        {
            echo "Fail to connect to database" . $this->connect_error;
        }
    }
    public function import($file)
    {
        $file = fopen($file, 'r');
        while ($row = fgetcsv($file))
        {
	    //prevent upload of field names
            if (in_array("email", $row, true))
            {
                continue;
            }
            //check for duplicate emails
            $email_check = $this->query("SELECT email FROM import_users WHERE email = '$row[3]'");
            if ($email_check->num_rows > 0)
            {
                if (in_array($row[3], $row, true))
                {
                 continue;
                }
            }
            
            $sha_pass = sha1($row[4]);
            $sha_pass = array(4 => $sha_pass);
            $row = array_replace($row, $sha_pass);

            $value = "'" . implode("','", $row) . "'";
            $sql = "INSERT INTO import_users(import_id,fname,lname,email,password) VALUES (" . $value . ")";

            if ($this->query($sql))
            {
                $this->state_csv = true;
            }
            else
            {
                $this->state_csv = false;
            }
        }

        if ($this->state_csv)
        {
           echo "<h4>Success</h4>Your import was successful<hr>";            
        }
        else
        {
           echo "<h4>Unsuccessful</h4>Your import was unsuccessful.<br> Either there were no unique values or something went wrong with your csv file.";

        }
    }
}
?>

