<html>
<head>
<title>Create question</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('admin/question/edit/'); ?>

<h2>Create a new question</h2>


<h5>Question text</h5>
<input type="text" name="txt" value="<?php echo set_value('txt'); ?>" size="50" />

<h5>Grade</h5>
<input type="txt" name="grade" value="<?php echo set_value('grade'); ?>"  /><br>

<h5>Answers</h5>
<p>1) <input type="text" name="answer1" value="<?php echo set_value('answer'); ?>" size="40" /><?php echo form_checkbox('answer11', TRUE)."<br>";?></p> 
<p>2) <input type="text" name="answer2" value="<?php echo set_value('answer'); ?>" size="40" /><?php echo form_checkbox('answer22', TRUE)."<br>";?></p>
<p>3) <input type="text" name="answer3" value="<?php echo set_value('answer'); ?>" size="40" /><?php echo form_checkbox('answer33', TRUE)."<br>";?></p>
<p>4) <input type="text" name="answer4" value="<?php echo set_value('answer'); ?>" size="40" /><?php echo form_checkbox('answer44', TRUE)."<br>";?></p>



<div><input type="submit"name="submit" value="Create new question" /></div>

</form>

</body>
</html>
