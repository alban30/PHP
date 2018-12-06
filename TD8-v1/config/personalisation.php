<?php
if(isset($_POST["page"])) {
    setcookie("Preference", $_POST["page"], time() + 60, "/");
    header("Location: ../index.php");
}
else {
    header("Location: preference.php");
}
?>
