<?php
session_start();
session_destroy();
header('Location: admin-login-form.php');
exit;
