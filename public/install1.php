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
	$query2="CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

  if ($mysqli->query($query2)) {
  	  $query3="CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query3)) {
	$query4="INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(71, '2014_10_12_000000_create_users_table', 1),
(72, '2014_10_12_100000_create_password_resets_table', 1),
(73, '2017_05_30_201715_create_roles_table', 1),
(74, '2017_06_03_013658_Photo', 1),
(75, '2017_06_10_145514_create_posts_table', 1),
(76, '2017_06_11_035042_create_categories_table', 1),
(77, '2017_06_16_000817_create_comments_table', 1),
(78, '2017_07_22_173410_add_column_slug_to_posts', 1),
(79, '2017_07_23_161015_create_settings_table', 1)";
 if ($mysqli->query($query4)) {
 	$query5="CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
 if ($mysqli->query($query5)) {
 	$query6="CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query6)) {
	$query7="CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query7)) {
	$query8="CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query8)) {
	$query9="INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'author', NULL, NULL),
(3, 'subscriber', NULL, NULL);";
if ($mysqli->query($query9)) {
	$query10="CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_subslogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_cover_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query10)) {
	$query11="INSERT INTO `settings` (`id`, `site_name`, `site_slogan`, `site_subslogan`, `site_description`, `site_cover_photo`, `site_footer_text`, `created_at`, `updated_at`) VALUES
(1, 'larablog', 'welcome to larablog', 'write like pro', 'Larablog is a web application which is develped with Laravel.In this Platform you can share your thoughts.A simple application where you may find some lackings,if you want me to impeove it then let me know.Thanks', '106541652833.jpg', '@copyright Naime Hossain', NULL, '2017-07-24 20:14:52')";
if ($mysqli->query($query11)) {
	$query12="CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if ($mysqli->query($query12)) {
	$query13="ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`)";
  if ($mysqli->query($query13)) {
  	$query14="ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`)";
   if ($mysqli->query($query13)) {
   	$query14="ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`)";
    if ($mysqli->query($query14)) {
    	$query15="ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`)";
   if ($mysqli->query($query15)) {
   	$query16="ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`)";
   if ($mysqli->query($query16)) {
   	 $query17="ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`),
  ADD KEY `posts_category_id_index` (`category_id`)";
  if ($mysqli->query($query17)) {
  	 $query18="ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`)";
   if ($mysqli->query($query18)) {
   	$query19="ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`)";
   if ($mysqli->query($query19)) {
   	$query20="ALTER TABLE `users`
      ADD PRIMARY KEY (`id`),
      ADD UNIQUE KEY `users_email_unique` (`email`),
    ADD KEY `users_role_id_index` (`role_id`),
     ADD KEY `users_photo_id_index` (`photo_id`)";
  if ($mysqli->query($query20)) {
  	$query21="ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT";
  if ($mysqli->query($query21)) {
  	$query22="ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT";
    if ($mysqli->query($query22)) {
    	$query23="ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80";
  if ($mysqli->query($query23)) {
  	$query24="ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT";
   if ($mysqli->query($query24)) {
   	$query25="ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT";
    if ($mysqli->query($query25)) {
    	$query26="ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";
     if ($mysqli->query($query26)) {
     	$query27="ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";
      if ($mysqli->query($query27)) {
      	$query28="ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";
    if ($mysqli->query($query28)) {
    	$query29="ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE";
  if ($mysqli->query($query29)) {
  	$message="all table creates";
  }
    }
      }
     }
    }
   }
  }
    }
  }
  }
   }
   }
  }
   }
   }
    }
   }
  }
}
}
}
}
}
}
}
 }
 }
}
  }
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