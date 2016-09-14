<html>
<head>
<title>Register Form</title>
</head>
<body>


<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h4>Register page</h4>
<form>
<h5>Email Adress</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Name</h5>
<input type="text" name="name" value="" size="50" />

<div><input type="submit" value="Register" /></div>

</form>

</body>
</html>
