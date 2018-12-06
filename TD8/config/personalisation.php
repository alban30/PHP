<?php
if(myGet("page") != false) {
		setcookie("Preference", myGet("page"), time() + 60, "/");
		header("Location: ../index.php");
}
else {
		header("Location: preference.php");
}
?>
