<html>
<head>
<title>Export CSV</title>

</head>
<body>

<h2>Export CSV</h2>


<a href="<?php echo site_url('admin/statistics') ?>">Homepage</a><br>

<a href="<?php echo site_url('admin/statistics/export_csv/all_users') ?>">All users</a><br>
<a href="<?php echo site_url('admin/statistics/export_csv/all_tests') ?>">All tests</a><br>
<a href="<?php echo site_url('admin/statistics/export_csv/all_classes') ?>">All classes</a><br>
<a href="<?php echo site_url('admin/statistics/export_csv/all_questions') ?>">All questions</a><br>
<a href="<?php echo site_url('admin/statistics/export_csv/all_answers') ?>">All answers</a><br>
<a href="<?php echo site_url('admin/statistics/export_csv/all_results') ?>">All results</a><br>

<h5>Results per user</h5>
<?php foreach($this->data['users'] as $key)
{   
    echo "<a href='".site_url('admin/statistics/export_csv/results_per_user/'.$key['id_user'])."'> {$key['name']}{$key['id_user']} </a><br>";  
}?>

<h5>Results per test</h5>
<?php foreach($this->data['tests'] as $key)
{   
    echo "<a href='".site_url('admin/statistics/export_csv/results_per_test/'.$key['id_test'])."'> {$key['name']}{$key['id_test']} </a><br>";  
}?>

</body>
</html>