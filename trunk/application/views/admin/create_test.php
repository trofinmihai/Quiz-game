<html>
<head>
<title>Create test</title>
</head>
<body>


<?php echo validation_errors(); ?>

<?php echo form_open('admin/test/edit/'); ?>

<h4>Create test</h4>

<form>
<h5>Name</h5>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />

<h5>Description</h5>
<input type="text" name="description" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Date</h5>
<input type="date" name="date" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Limit test</h5>
<input type="text" name="limit_test" value="" size="50" /><br>

<h4>Add questions</h4>
<?php 
foreach($questions as $value=>$key)
{

 	echo form_checkbox('question[]', $key['id_question']).$key['txt']."<br>";	
 	
} 
?>
<div><input type="submit"name="submit" value="Create test" /></div>

</form>

</body>
</html>
