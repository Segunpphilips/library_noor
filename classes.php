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
        $sql = "INSERT INTO book_upload(book_pdf, book_name) VALUES('$book_pdf', '$book_name')";
        $this->dbcon->query($sql);
        if ($this->dbcon->error) {
			//logging of error into a file
			$upload_error = 'logs/upload_error.txt';
			$error_msg = $this->dbcon->error." for raw upload of book ".$book_name." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($upload_error, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>";
		}elseif($this->dbcon->affected_rows > 0){	
            return true;
		}else{
            return "<div class='alert alert-warning p-4 mt-4'>$book_name previously uploaded</div>";
        }
    }

    public function getRawUpdate(){
        $sql = "SELECT * FROM book_upload";
        $result = $this->dbcon->query($sql);
        if ($this->dbcon->error) {
			//logging of error into a file
			$fetch_error = 'logs/fetch_error.txt';
			$error_msg = $this->dbcon->error." for getting all for the admin to upload on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($fetch_error, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>";
		}else{	
            $rows = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				    }
                return $rows;
            }else{
                return "<div class='col-11 alert alert-info p-4 mt-4 ml-3 mr-1' style='height: 100px;'>No book is available for upload</div>";
            }
		}
    }

    public function addBook($book_title, $personel_email, $book_slug, $book_description, $book_pdf, $book_name, $book_department){
    
        $sql = "INSERT INTO books(book_department, book_slug, book_title, book_description, personel_email) VALUES((SELECT department_id FROM departments WHERE department_id = $book_department), '$book_slug', '$book_title', '$book_description','$personel_email')";

 		$result = $this->dbcon->query($sql);

        $rawUpdate = $this->rawUpdate($book_pdf, $book_name);
		if ($rawUpdate) {

            if ($this->dbcon->error) {
                //logging of error into a file
                $upload_error = 'logs/upload_error.txt';
                $error_msg = $this->dbcon->error." for upload of book ".$book_name." on ".date('l F Y h:i:s A')."."."\n";
                file_put_contents($upload_error, $error_msg, FILE_APPEND);
                 return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>";
            }else{
                $message = "<div class='alert alert-success alert-dismissible fade show mt-3 p-4' role='alert'>".$book_name." successfully uploaded, please await admin's aprroval to view book in the department's library <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>close</span></button></div>"; 
                return $message;
            }
        }else{
            return $rawUpdate;
        }
    }

    public function adminBookUpload($book_pdf, $book_name){

        $sql = "UPDATE books SET book_name = '$book_name', book_pdf = '$book_pdf' WHERE book_title = '$book_name'";

        $result = $this->dbcon->query($sql);
        if ($this->dbcon->error) {
                //logging of error into a file
                $update_error = 'logs/update_error.txt';
                $error_msg = $this->dbcon->error." for update of book by admin".$book_name." on ".date('l F Y h:i:s A')."."."\n";
                file_put_contents($update_error, $error_msg, FILE_APPEND);
                 return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>"; 
            }else{
                
                if($this->dbcon->affected_rows == 1) {
                    $sql2 = "DELETE FROM book_upload WHERE book_name = '$book_name' LIMIT 1";
                    $result2 = $this->dbcon->query($sql2);
                    if (!$result2) {
                    //logging of error into a file
                    $delete_error = 'logs/delete_error.txt';
                    $error_msg = $this->dbcon->error." for delete of book ".$book_name." by admin on ".date('l F Y h:i:s A')."."."\n";
                    file_put_contents($delete_error, $error_msg, FILE_APPEND);
                        return "<div class='alert alert-danger p-3'>Oops! Something went wrong, please try to upload again.</div>";
                    }else{
                        return "<div class='alert alert-success p-3 mt-5'> $book_name has been successfully updated</div>";
                    }

                    return "<div class='alert alert-danger p-3'>Oops! Something went wrong, please try to upload again....</div>";
                } 
            }

    }

    public function getBookDepartment($book_department){
        $sql = "SELECT department_name FROM departments WHERE department_id = '$book_department'";
        $result = $this->dbcon->query($sql);
        if ($this->dbcon->error) {
			//logging of error into a file
			$fetch_error = 'logs/fetch_error.txt';
			$error_msg = $this->dbcon->error." for getting department name on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($fetch_error, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>";
		}else{
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
			}
        }

    }

    public function getdepartmentalBooks($book_department){
        $sql = "SELECT * FROM books WHERE book_department = '$book_department'";
        $result = $this->dbcon->query($sql);
        if ($this->dbcon->error) {
			//logging of error into a file
			$fetch_error = 'logs/fetch_error.txt';
			$error_msg = $this->dbcon->error." for getting departmental books on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($fetch_error, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please try to upload again.</div>";
		}else{	
            $rows = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				    }
                return $rows;
            }else{

                return "<div class='col-11 alert alert-primary p-4 mt-4 ml-3 mr-1 text-center' style='height: 100px;'>No Book have been uploaded to this department's library <a href='form.php' class='alert-link'>Submit a book.</a></div>";
            }
		}
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