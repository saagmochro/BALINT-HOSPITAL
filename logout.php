<?php
session_start();
session_destroy();
header("Location: index.html"); // back to login/register page
exit();
?>
