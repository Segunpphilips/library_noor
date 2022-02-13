<?php

use Constants\Constants;

# Begin book class definition
class Books{

    use Sanitize;

    public $dbcon;

    public function __construct()
    {
        //connect to database
        $this->dbcon = new mysqli(Constants::DB_HOST, Constants::DB_USERNAME, Constants::DB_PASSWORD, Constants::DB_DATABASENAME);
        if ($this->dbcon->connect_error)  {
            //logging of error into a file
            $connection_errors = 'connection_errors.txt';
            $error_msg = "Connection Error of class Users ".$this->dbcon->connect_error."\n";
            file_put_contents($connection_errors, $error_msg, FILE_APPEND);
            die("Conneciton Failure: the reason for is ".$this->dbcon->connect_error);
            }
    }

    public static function addBook($book_tite, $book_slug, $book_title, $book_description, $book_coverimage, $book_pdf){

    }
 
}
# End book class definition


# Begin sanitize class definition
trait Sanitize{

	//Begin Sanitize input
	public function sanitizeInputs($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data; 
	}	

	//End Sanitize input
}
# End sanitize class definition