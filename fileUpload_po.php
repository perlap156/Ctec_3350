<?php
// check to see if the form is submitted
if (array_key_exists('upload', $_POST)) {

	// allowed file types
	$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_TIFF_II, IMAGE_TIFF_MM); 
	$detectedType = exif_imagetype($_FILES['image']['tmp_name']);

	$_FILES['image']['name'] = str_replace(' ', '_' , $_FILES['image']['name']);

	$msg = "";

	if (in_array($detectedType, $allowedTypes)){
		// define constant for upload folder
		define('UPLOAD_DIR', '/home/p/px/pxo8731/public_html/ctec4321/lab/upload/storage/');

		move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR.$_FILES['image']['name']);

		$msg = "Upload Successful";
	}
	else {$msg = "File Type Not Allowed";}
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File upload</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage">
    <p>
	<label for="image">Upload image:</label>
        <input type="file" name="image" id="image" /> 
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload" />
    </p>
</form>

<pre>
<?php
if (array_key_exists('upload', $_POST)) {
  print_r($_FILES);
  }
?>
</pre>
</body>
</html>
