<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/mailer.php';

$email = strtolower(trim($_GET['email'] ?? $_POST['email'] ?? ''));
$done  = false;

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stmt = db()->prepare('SELECT * FROM schools WHERE email=?');
    $stmt->execute([$email]);
    $school = $stmt->fetch();

    if ($school && !$school['email_verified']) {
        $token   = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+48 hours'));
        db()->prepare("UPDATE schools SET verify_token=?, verify_expires=? WHERE id=?")
            ->execute([$token, $expires, $school['id']]);

        $base_url   = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'edupro.co.zw');
        $verify_url = $base_url . '/portal/verify.php?token=' . $token . '&id=' . $school['id'];

        $body = "Dear {$school['head_name']},\n\nHere is your new email verification link for Edupro SMS:\n\n{$verify_url}\n\nThis link expires in 48 hours.\n\nEdupro SMS Support";
        mail_sales($email, 'Resent: Verify Your Email — Edupro SMS', $body, 'support@edupro.co.zw');
    }
    $done = true; // always show success
}
header('Location: login.php?msg=' . ($done ? 'registered' : 'session_expired'));
exit;
