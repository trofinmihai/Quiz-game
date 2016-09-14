<html>
<head>
<title>Homepage</title>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h3>You are logged in as <?php echo $user->name.", ".$user->email ?></h3>
<h4>Id user <?php echo $user->id_user ?></h4>


<a href="<?php echo site_url('account/logout') ?>">Logout</a>
<a href="<?php echo site_url('admin/user/users') ?>">Users</a>
<a href="<?php echo site_url('admin/classs') ?>">Classes</a>
<a href="<?php echo site_url('admin/test/tests') ?>">Tests</a>
<a href="<?php echo site_url('admin/question/questions') ?>">Questions</a>
<a href="<?php echo site_url('admin/statistics') ?>">Statistics</a>
<a href="<?php echo site_url('admin/upload') ?>">Upload file</a>

</body>
</html>