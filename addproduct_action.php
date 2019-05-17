<?php
include('dbconnect.php');
if($_POST)
{
	$pname=$_POST['pname'];
	$ptype=$_POST['ptype'];
	$btype=$_POST['btype'];
	$pimage=$_FILES['pimage']['name'];
	$pdescript=$_POST['pdescript'];
	$pcost=$_POST['pcost'];
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["pimage"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["pimage"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else {
    if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["pimage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	}
	


// $obj->insert("student","student_name,rollno,grade,branch,hsc,city","'Atharva','107','A','CM',90,'Thane'");
// echo "record inserted";

// $obj->insert("student","student_name,rollno,grade,branch,hsc,city","'Shreyas','109','B','CM',90,'Thane'");
// echo "record inserted";
$sql= "INSERT into tbl_products (pname,ptype,btype,pimage,pdescript,pcost) VALUES ('$pname','$ptype','$btype','$target_file','$pdescript','$pcost')";
if(mysqli_query($conn,$sql))
{
	echo "record inserted";
}
else 
{
	echo "error".mysqli_error($conn);
}


// $obj->delete("student","rollno=107");
// echo "record deleted";

// $res=$obj->select("*","student","1=1");
// if(count($res)>0)
// {
// 	foreach ($res as $row) 
// 	{
// 		echo $row['student_name'].' '.$row['rollno'].'<br>';
// 	}
// }
// else {echo "no record found";}


}
?>
	