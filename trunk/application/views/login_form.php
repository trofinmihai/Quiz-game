<html>
<head>
<title>Login Form</title>
</head>
<body>


<?php echo validation_errors(); ?>

<?php echo form_open('login_controller'); ?>

<h5>Email Adress</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />


<div><input type="submit" value="Login" /></div>
<a href="<?php echo site_url('form') ?>">Register</a>

</form>

</body>
</html>


<!-- Alt model de form -->

<!--
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
 </body>
</html>
-->
