<?php

include_once "classes.php";

if (isset($_POST['submit']) ) {

    //Form validation
    if (empty($_POST['book_name'])) {
        $message1 = 'The Book Name field is required';
        $error_upload[] = $message1;
    }

    if (empty($_POST['user_email'])) {
        $message2 = 'The Personel Email field is required';
        $error_upload[] = $message2;
    }

    if (empty($_POST['book_department'])) {
        $message3 = 'The Book Department field is required';
        $error_upload[] = $message3;
    }

    if (empty($_FILES['book_pdf']['name'])) {
        $message4 = 'The Book Pdf must be uploaded';
        $error_upload[] = $message4;
    }

    if (empty($_POST['book_description'])) {
        $message5 = 'The Book Description field is required';
        $error_upload[] = $message5;
    }

    if (isset($error_upload)) {

        $error_upload = urlencode(serialize($error_upload));
		header("Location: form.php?upload_error=$error_upload");
        exit;
	}

    if (empty($error_upload)) {

        $filename = $_FILES['book_pdf']['name'];
        $filetype = $_FILES['book_pdf']['type'];
        $filetemp = $_FILES['book_pdf']['tmp_name'];
        $file_error = $_FILES['book_pdf']['error'];
        $filesize = $_FILES['book_pdf']['size'];
        
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // exit;
        if ($file_error > 0) {

            $error_upload[] = "Please select a file for upload";
            $error_upload = urlencode(serialize($error_upload));
            header("Location: form.php?upload_error=$error_upload");
            exit;
        }else{
            //check for the right file extension
            $extension = "pdf";
            $file_ext = explode(".", $filename);
            $file_ext = end($file_ext);
            $file_ext_lowerCase = strtolower($file_ext);
    
            //echo $file_ext;
            if ($file_ext != $extension) {
                $error_upload[] = "Only pdf documents are allowed";
                $error_upload = urlencode(serialize($error_upload));
                header("Location: form.php?upload_error=$error_upload");
                exit;
            }else{
               
            }
        }

        //create Books instance
		$obj = new Books;

        $book_title =  $obj->sanitizeInputs($_POST['book_name']);
        $book_slug = $obj->titleToSlug($book_title);
        $personel_email =  $obj->sanitizeInputs($_POST['user_email']);
        $book_name = $obj->sanitizeInputs($_POST['book_name']);
        $book_description =  $obj->sanitizeInputs($_POST['book_description']);
        $book_department = $_POST['book_department'];

        $book_pdf = $book_slug."."."$file_ext";
        $destination = "assets/book_upload/".$book_pdf;

        move_uploaded_file($filetemp, $destination);
        
        // echo $book_title." ".$book_slug." ".$personel_email;
        // exit;

		//Calling updateProfilePicture method to upload profile picture
		$output = $obj->addBook($book_title, $personel_email, $book_slug, $book_description, $book_pdf, $book_name, $book_department);
        header("Location: form.php?msg=$output");
		exit;
    }
    
};

if (isset($_POST['book_update'])) {
    //  echo "I got here";

      //create Books instance
		$obj = new Books;
        $book_pdf = $_POST['book_pdf'];
        $book_name = $_POST['book_name'];
        $output = $obj->adminBookUpload($book_pdf, $book_name);
        if (empty($output)) {
            $output = "<div class='alert alert-danger p-3'>Oops! Something went wrong, please try to upload again..</div>";
        }
        header("Location: admin-door.php?msg=$output");
		exit;
}