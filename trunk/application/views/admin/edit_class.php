<html>
<head>
<title>Edit class</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('admin/classs/edit/'.$classes[0]['id_class']); ?>

<h2>Edit your class</h2>


<h5>Name of class</h5>
<input type="txt" name="name" value="<?php echo set_value('name', $classes[0]['name']); ?>"  /><br>

<h4>Delete users from class</h4>
<?php 
foreach($users_per_class as $key)
{
echo form_checkbox('delete_users[]', $key['id_user'])." ".$key['name']." ".$key['id_user']."<br>";	
}
?>

<h4>Add users to class</h4>
<?php 
foreach($users_without_class as $value=>$key)
{

 	echo form_checkbox('users_without_class[]', $key['id_user']).$key['name']." ".$key['id_user']."<br>";	
 	
} 
?><br>
<div><input type="submit"name="submit" value="Edit class" /></div>

</form>

</body>
</html>
