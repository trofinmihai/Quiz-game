<html>
<head>
<title>Upload file</title>

</head>
<body>

<h2>Upload file</h2>

	<?php echo $error;?>
	<?php echo form_open_multipart('admin/upload/do_upload');?>

	<input type="file" name="userfile" size="20" />

	<br/><br/>

	<input type="submit" value="Upload" />

	</form>


</body>
</html>