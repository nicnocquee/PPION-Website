<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Error</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

<body>
<?php if ($history == 'login') { ?>
	<script>
    alert("You're not allowed to access this page");
    location = "/home";
</script>
<?php } else { ?>
<script>
    alert("You're not allowed to access this page");
    //location = "http://i-code.co.uk/index.php";
    history.back();
</script>
<?php } ?>

</body>
</html>