<html>
<head>
<title>Create class</title>
</head>
<body>


<?php echo validation_errors(); ?>

<?php echo form_open('admin/classs/edit/'); ?>
<?php echo $this->input->get('error')? 'Error' : NULL; ?>
<h4>Create test</h4>

<form>
<h5>Name</h5>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />


<h4>Add users to class</h4>
<?php 
foreach($users_without_class as $value=>$key)
{

 	echo form_checkbox('users_without_class[]', $key['id_user']).$key['name']." ".$key['id_user']."<br>";	
 	
} ?>
<div><input type="submit"name="submit" value="Create class" /></div>

</form>

</body>
</html>
