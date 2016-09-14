<html>
<head>
<title>Edit question</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('admin/question/edit/'.$question->id_question); ?>

<h2>Edit your question</h2>


<h5>Question text</h5>
<input type="text" name="txt" value="<?php echo set_value('txt', $question->txt); ?>" size="50" />

<h5>Grade</h5>
<input type="txt" name="grade" value="<?php echo set_value('grade', $question->grade); ?>"  /><br>


<h5>New Answers</h5>
<p>1) <input type="text" name="answer1" value="<?php echo set_value('answer', $a_per_q[0]['txt']); ?>" size="40" /><?php echo form_checkbox('answer11', TRUE, $a_per_q[0]['is_correst'])."<br>";?></p> 
<p>2) <input type="text" name="answer2" value="<?php echo set_value('answer', $a_per_q[1]['txt']); ?>" size="40" /><?php echo form_checkbox('answer22', TRUE, $a_per_q[1]['is_correst'])."<br>";?></p>
<p>3) <input type="text" name="answer3" value="<?php echo set_value('answer', $a_per_q[2]['txt']); ?>" size="40" /><?php echo form_checkbox('answer33', TRUE, $a_per_q[2]['is_correst'])."<br>";?></p>
<p>4) <input type="text" name="answer4" value="<?php echo set_value('answer', $a_per_q[3]['txt']); ?>" size="40" /><?php echo form_checkbox('answer44', TRUE, $a_per_q[3]['is_correst'])."<br>";?></p>



<div><input type="submit"name="submit" value="Edit question" /></div>

</form>

</body>
</html>
