<?php

use Constants\Constants;
include_once 'config/constants.php';

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
            $connection_errors = 'logs/connection_errors.txt';
            $error_msg = "Connection Error of class Users ".$this->dbcon->connect_error."\n";
            file_put_contents($connection_errors, $error_msg, FILE_APPEND);
            die("Conneciton Failure: the reason for is ".$this->dbcon->connect_error);
            }
    }

    public function titleToSlug($string){
        $slug = trim($string); // trim the string
        $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug= str_replace(' ','-', $slug); // replace spaces by dashes
        $slug= strtolower($slug);  // make it lowercase
        return $slug;
    }

    public function rawUpdate($book_pdf, $book_name){

    }

    public function addBook($book_title, $personel_email, $book_slug, $book_description, $book_pdf, $book_name, $book_department){
    
        $sql = "INSERT INTO books(book_department, book_slug, book_title, book_description, personel_email) VALUES((SELECT department_id FROM departments WHERE department_id = $book_department), '$book_slug', '$book_title', '$book_description,','$personel_email') ";

 		$result = $this->dbcon->query($sql);

        $this->rawUpdate($book_pdf, $book_name);
		if ($this->dbcon->error) {
			//logging of error into a file
			$upload_error = 'logs/upload_error.txt';
			$error_msg = $this->dbcon->error." for upload of book ".$book_name." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($upload_error, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."There is an error ".$this->dbcon->error."</div>";
		}else{
			$message = "<div class='alert alert-success'>".$book_name." successfully uploaded,please await admin aprroval to view book on the list </div>"; 
            return $message;
		}
    }

    public function updateBook($book_pdf, $book_name){

    }

    public function getdepartmentalBooks(){

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