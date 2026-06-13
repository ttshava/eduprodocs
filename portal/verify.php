<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/mailer.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$token     = trim($_GET['token'] ?? '');
$school_id = (int)($_GET['id'] ?? 0);
$status    = 'error';
$school    = null;

if ($token && $school_id) {
    $stmt = db()->prepare("SELECT * FROM schools WHERE id=? AND verify_token=?");
    $stmt->execute([$school_id, $token]);
    $school = $stmt->fetch();

    if (!$school) {
        $status = 'invalid';
    } elseif ($school['email_verified']) {
        $status = 'already';
    } elseif (strtotime($school['verify_expires']) < time()) {
        $status = 'expired';
    } else {
        // Activate account
        db()->prepare("UPDATE schools SET
            email_verified=1, is_active=1,
            verify_token=NULL, verify_expires=NULL,
            updated_at=datetime('now')
            WHERE id=?
        ")->execute([$school_id]);

        log_activity($school_id, 'email_verified', 'Email verified — account activated');

        // Send welcome email with login details
        $base_url   = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'edupro.co.zw');
        $login_url  = $base_url . '/portal/login.php';
        $welcome    = "Dear {$school['head_name']},\n\n"
            . "🎉 Your Edupro SMS account is now ACTIVE!\n\n"
            . "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n"
            . "YOUR LOGIN DETAILS\n"
            . "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n"
            . "School:    {$school['school_name']}\n"
            . "Code:      {$school['school_code']}\n"
            . "Login URL: {$login_url}\n"
            . "Email:     {$school['email']}\n"
            . "Password:  (the password you set during registration)\n"
            . "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n"
            . "You can now:\n"
            . "✓ View and update your school profile\n"
            . "✓ Activate Edupro SMS modules\n"
            . "✓ Track enrollment and fees\n"
            . "✓ Manage your subscription\n\n"
            . "To get started with installation and onboarding:\n"
            . "Email:    sales@edupro.co.zw\n"
            . "WhatsApp: +263 772 837 385\n"
            . "Phone:    +263 788 111 611\n\n"
            . "Welcome aboard!\n"
            . "Edupro SMS Team\nwww.edupro.co.zw";

        mail_sales($school['email'], "Welcome to Edupro SMS — Your Account is Active!", $welcome, 'support@edupro.co.zw');

        // Alert sales
        mail_sales('sales@edupro.co.zw',
            "✅ Account Activated: {$school['school_name']}",
            "School: {$school['school_name']}\nCode: {$school['school_code']}\nEmail: {$school['email']}\nProvince: {$school['province']} / {$school['district']}\n\nAccount is now active — school can log in."
        );

        $status = 'success';
    }
}
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email Verification — Edupro SMS</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body{background:#f3f4f6;font-family:'Inter',system-ui,sans-serif;display:flex;flex-direction:column;min-height:100vh;}
.portal-nav{background:#fff;border-bottom:2px solid var(--red,#FF0527);padding:0 32px;height:64px;display:flex;align-items:center;justify-content:space-between;box-shadow:0 2px 8px rgba(0,0,0,.07);}
.portal-nav img{height:40px;}
.portal-nav a{font-size:.85rem;font-weight:600;color:#374151;text-decoration:none;margin-left:16px;}
.wrap{flex:1;display:flex;align-items:center;justify-content:center;padding:40px 20px;}
.card{background:#fff;border-radius:16px;box-shadow:0 4px 32px rgba(0,0,0,.1);padding:48px 40px;text-align:center;max-width:500px;width:100%;}
.icon{font-size:4rem;margin-bottom:20px;}
h1{font-size:1.6rem;font-weight:800;margin-bottom:12px;}
p{color:#6b7280;line-height:1.7;margin-bottom:12px;}
.btn{display:inline-block;padding:12px 32px;background:var(--red,#FF0527);color:#fff;border-radius:8px;font-weight:700;text-decoration:none;margin-top:16px;}
.btn:hover{background:#c8021e;}
.btn-outline{background:transparent;color:var(--red,#FF0527);border:2px solid var(--red,#FF0527);margin-left:10px;}
</style>
</head>
<body>
<nav class="portal-nav">
  <a href="../index.html"><img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'"></a>
  <div><a href="login.php">School Login →</a></div>
</nav>
<div class="wrap">
  <div class="card">
    <?php if ($status === 'success'): ?>
      <div class="icon">🎉</div>
      <h1>Email Verified!</h1>
      <p>Your Edupro SMS account for <strong><?= htmlspecialchars($school['school_name']) ?></strong> is now active.</p>
      <p>We've sent your login details to <strong><?= htmlspecialchars($school['email']) ?></strong>.</p>
      <p style="font-size:.875rem;">You can now log in to your school dashboard using your email and the password you set during registration.</p>
      <a href="login.php" class="btn">Go to Dashboard →</a>

    <?php elseif ($status === 'already'): ?>
      <div class="icon">✅</div>
      <h1>Already Verified</h1>
      <p>This email has already been verified. Your account is active.</p>
      <a href="login.php" class="btn">Log In →</a>

    <?php elseif ($status === 'expired'): ?>
      <div class="icon">⏰</div>
      <h1>Link Expired</h1>
      <p>This verification link has expired (links are valid for 48 hours).</p>
      <p>Register again to receive a new link.</p>
      <a href="register.php" class="btn">Register Again</a>
      <a href="../contact.php" class="btn btn-outline">Contact Support</a>

    <?php else: ?>
      <div class="icon">❌</div>
      <h1>Invalid Link</h1>
      <p>This verification link is invalid or has already been used.</p>
      <a href="register.php" class="btn">Register Your School</a>
      <a href="../contact.php" class="btn btn-outline">Contact Support</a>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
