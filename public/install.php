<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>install app</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
	<?php 
	$message=0;
        if (isset($_POST['install'])) {
        	if (isset($_POST['db_name']) && isset($_POST['user_name']) && isset($_POST['password'])) {
        		$db_name=$_POST['db_name'];
        		$user_name=$_POST['user_name'];
        		$password=$_POST['password'];
        		 if (!empty($db_name) && !empty($user_name) && !empty($password)) {
        		 	$mysqli=new mysqli('localhost',$user_name,'',$db_name);
        		 	if ($mysqli->connect_errno) {
        		 		$message='provide authentic details';
        		 	}else{
   $query1="CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query1)) {
	$message='table created';
	$query2="INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'uncategorized', '2017-06-23 04:23:18', '2017-06-23 04:23:18'),
(2, 'Energy and power', '2017-06-23 04:23:18', '2017-06-23 04:23:18'),
(3, 'laravel', '2017-06-23 16:45:51', '2017-06-23 16:45:51'),
(4, 'short story', '2017-07-08 10:10:43', '2017-07-08 10:10:43')";
}


        		 	}
        		 }else{
        		 	$message="all field reqired";
        		 }
        	}else{
        		$message="all field reqired";
        	}
        }

	 ?>

	 <div class="container">
	 	<div class="row">
	 	 <?php if($message) { ?>
	 	 <div class="col-md-12">
	 	 	<div class="alert alert-danger">
	 	 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	 	 		<strong>Alert</strong> <?php echo $message ?>.
	 	 	</div>
	 	 </div>	
	 	 <?php } ?>
	 		<div class="col-md-8 col-md-offset-2">
	 <form action="" method="POST" role="form">
	 	<legend>database info</legend>
	 
	 	<div class="form-group">
	 		<label for="">database name</label>
	 		<input name="db_name" type="text" class="form-control" id="" placeholder="database name">
	 		<label for="">database user name</label>
	 		<input name="user_name" type="text" class="form-control" id="" placeholder="database user name">
	 		<label for="">database password name</label>
	 		<input name="password" type="text" class="form-control" id="" placeholder="database password ">
	 	</div>
	 
	 	
	 
	 	<button name='install' type="submit" class="btn btn-primary">install</button>
	 </form>
	 		</div>
	 	</div>
	 </div>

	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  ></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript" ></script>
</body>
</html>