<html>
<head>
<title>Edit test</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('admin/test/edit/'.$test->id_test); ?>

<h2>Edit your test</h2>

<h5>Name</h5>
<input type="text" name="name" value="<?php echo set_value('name', $test->name); ?>" size="50" />

<h5>Description</h5>
<input type="text" name="description" value="<?php echo set_value('description', $test->description); ?>" size="50" />

<h5>Date</h5>
<input type="date" name="date" value="<?php echo set_value('date', $test->date_time); ?>"  />

<h5>Limit test</h5>
<input type="text" name="limit_test" value="<?php echo set_value('limit_test',$test->limit_test); ?>" size="50" />
<h4>Delete questions</h4>
<?php 
foreach($q_per_test as $key)
{
echo form_checkbox('q_per_test[]', $key['id_question']).$key['txt']."<br>";	
}
?>
<h4>Add questions</h4>
<?php 
foreach($questions as $value=>$key)
{

 	echo form_checkbox('question[]', $key['id_question']).$key['txt']."<br>";	
 	
} 
?>
<div><input type="submit"name="submit" value="Edit test" /></div>

</form>

</body>
</html>
