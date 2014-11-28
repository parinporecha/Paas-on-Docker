<?php
	//echo $_POST['app_name']." ";
//unique app name is needed
	//echo $_POST['lang']." ";
$target_dir = "cloud_project/apps/";
$target_file = $target_dir . trim(basename($_FILES["appArchive"]["name"]));
$app_name = strtolower(str_replace(" ","_",trim($_POST['app_name'])));
$file_name = basename($_FILES["appArchive"]["name"]);
$uploadOk = 1;
$allowedCompressedTypes = array("application/x-rar-compressed", "application/zip", "application/x-zip", "application/octet-stream", "application/x-zip-compressed");

if (in_array($_FILES["appArchive"]["type"], $allowedCompressedTypes))  {
    if (move_uploaded_file($_FILES["appArchive"]["tmp_name"], $target_file)) {
		
		$port = shell_exec('sudo bash '.$target_dir.'../run.sh "'.$file_name.'" '.$target_dir.'../ "'.$app_name.'"');
        //echo " The file ". basename( $_FILES["appArchive"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
echo $port;
?>
