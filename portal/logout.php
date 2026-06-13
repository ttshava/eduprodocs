<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/db.php';
if (!empty($_SESSION['school_id'])) {
    log_activity($_SESSION['school_id'], 'logout', '');
}
session_destroy();
header('Location: login.php?msg=logged_out');
exit;
