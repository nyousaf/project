<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verify Email</title>
</head>
<body>
	
	<p><a target="_blank" href="<?php echo e(route('sendEmailDone',["email" => $user->email, "verifyToken" => $user->verifyToken])); ?>" style="color:#0a84ae; text-decoration:none" target="_blank">Click to verify email</a></p>
	<br>
	<p>If click not work Just Paste the link to your browser manually.</p>
	<a href="#" style="color:#0a84ae; text-decoration:none" target="_blank"><?php echo e(route('sendEmailDone',["email" => $user->email, "verifyToken" => $user->verifyToken])); ?></a>
</body>
</html>