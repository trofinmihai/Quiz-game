<html>
<head>
<title>Edit profile</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('account/edit'); ?>

<img src="<?php echo base_url(); ?>css/undestudiem_logo1.png" alt="Logo undestudiem.ro" id="logo"/>

<h2>Edit your profile</h2>

<h5>Email Adress</h5>
<input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Name</h5>
<input type="text" name="name" value="<?php echo set_value('name',$user->name); ?>" size="50" />

<div><input type="submit" value="Edit" /></div>

</form>

</body>
</html>
