<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
	header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

if(isset($_REQUEST['addseal']))
{



        /* START UPLOAD */
        if (count($_FILES['file']['name'])>0) {
            $j = 0; //Variable for indexing uploaded image

            $target_path = "multiple_image_upload/uploads/"; //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

                $validextensions = array("jpeg", "jpg", "png", "pdf", "csv", "doc", "docx", "xls", "xlsx", "tsv", "txt", "ppt", "pptx");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)
                $file_extension = end($ext); //store extensions in the variable

                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
                $j = $j + 1;//increment the number of uploaded images according to the files in array

                if (($_FILES["file"]["size"][$i] < 100000000) //Approx. 100kb files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder

                        //echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';

                        $eseal_attachment_name =$ext[0];
                        $eseal_attachment_path =$target_path;
                        $eseal_attachment_status =1;

                        $insert_attachment_sq1 = "INSERT INTO `exporter_attachment` (eseal_id, eseal_attachment_name, eseal_attachment_path,eseal_attachment_status)
                        VALUES ('$user_id','$eseal_attachment_name','$eseal_attachment_path','$eseal_attachment_status')";

                        $insert_attachment_exe = mysql_query($insert_attachment_sq1);


                    } else {//if file was not moved.

                        //echo $j. ').<span id="error">please try again!.</span><br/><br/>';

                    }
                } else {//if file size and file type was incorrect.

                    //echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';

                }
            }

        }
        /* END UPLOAD */

        header("Location: my-document.php?success=1&msg=all");

				

}
else
{
header("Location: my-document.php?error=1&msg=all");
} 	
	
?>
                            
						