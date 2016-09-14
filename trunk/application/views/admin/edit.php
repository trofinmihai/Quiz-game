<html>
<head>
<title>Edit user</title>
</head>
<body>	


<?php echo validation_errors(); ?>

<?php echo form_open('admin/user/edit/'.$user->id_user); ?>

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
