<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/mailer.php';

$msg   = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $stmt = db()->prepare('SELECT * FROM schools WHERE email=?');
        $stmt->execute([$email]);
        $school = $stmt->fetch();

        if ($school) {
            $token    = bin2hex(random_bytes(32));
            $expires  = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $token_hash = hash('sha256', $token);

            // Store token in activity log (reuse table)
            db()->prepare("INSERT INTO activity_log(school_id,action,detail,ip_address) VALUES(?,?,?,?)")
                ->execute([$school['id'], 'password_reset_token', $token_hash . '|' . $expires, $_SERVER['REMOTE_ADDR'] ?? '']);

            $reset_url = 'https://edupro.co.zw/portal/reset.php?token=' . $token . '&id=' . $school['id'];
            $body = "Dear {$school['head_name']},\n\nA password reset was requested for your Edupro SMS school account.\n\nReset your password here (link expires in 1 hour):\n{$reset_url}\n\nIf you did not request this, ignore this email.\n\nEdupro SMS Support";
            mail_support($email, 'Password Reset — Edupro SMS', $body);
        }

        // Always show same message (no user enumeration)
        $msg = 'If an account with that email exists, a password reset link has been sent.';
    }
}
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password — Edupro SMS</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body{background:#f3f4f6;font-family:'Inter',system-ui,sans-serif;display:flex;flex-direction:column;min-height:100vh;}
.wrap{flex:1;display:flex;align-items:center;justify-content:center;padding:40px 20px;}
.card{background:#fff;border-radius:16px;box-shadow:0 4px 32px rgba(0,0,0,.1);width:100%;max-width:420px;overflow:hidden;}
.card-head{background:linear-gradient(135deg,#1a0a0e,#3d1018);padding:32px;text-align:center;color:#fff;}
.card-head img{height:48px;margin-bottom:12px;}
.card-head h1{font-size:1.2rem;font-weight:800;margin:0 0 4px;}
.card-head p{color:rgba(255,255,255,.65);font-size:.85rem;margin:0;}
.card-body{padding:28px 32px;}
.fg{margin-bottom:16px;}
.fg label{display:block;font-size:.82rem;font-weight:600;color:#374151;margin-bottom:5px;}
.fg input{width:100%;padding:10px 13px;border:1.5px solid #d1d5db;border-radius:8px;font-size:.9rem;box-sizing:border-box;}
.fg input:focus{outline:none;border-color:#FF0527;box-shadow:0 0 0 3px rgba(255,5,39,.08);}
.btn{width:100%;padding:12px;background:#FF0527;color:#fff;border:none;border-radius:8px;font-weight:700;cursor:pointer;font-size:.95rem;}
.btn:hover{background:#c8021e;}
.alert-s{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7;border-radius:8px;padding:12px;font-size:.875rem;margin-bottom:16px;}
.alert-e{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5;border-radius:8px;padding:12px;font-size:.875rem;margin-bottom:16px;}
.back{text-align:center;margin-top:16px;font-size:.875rem;color:#6b7280;}
.back a{color:#FF0527;font-weight:600;text-decoration:none;}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="card-head">
      <img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'">
      <h1>Reset Your Password</h1>
      <p>Enter your school email to receive a reset link</p>
    </div>
    <div class="card-body">
      <?php if ($msg): ?><div class="alert-s"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
      <?php if ($error): ?><div class="alert-e"><?= htmlspecialchars($error) ?></div><?php endif; ?>
      <form method="POST">
        <div class="fg">
          <label>School Email Address</label>
          <input type="email" name="email" required placeholder="school@domain.com">
        </div>
        <button class="btn">Send Reset Link</button>
      </form>
      <div class="back"><a href="login.php">← Back to Login</a></div>
    </div>
  </div>
</div>
</body>
</html>
