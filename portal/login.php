<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/mailer.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if (current_school()) { header('Location: dashboard.php'); exit; }

$error = '';
$msg   = $_GET['msg'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $error = 'Please enter your email and password.';
    } else {
        $stmt = db()->prepare('SELECT * FROM schools WHERE email=?');
        $stmt->execute([$email]);
        $school = $stmt->fetch();

        if (!$school) {
            $error = 'No account found with that email address. <a href="register.php" style="color:var(--red);">Register your school →</a>';
        } elseif (!$school['password_hash']) {
            $error = 'This school is in our database but hasn\'t registered a portal account yet. <a href="register.php" style="color:var(--red);">Complete registration →</a>';
        } elseif (!$school['email_verified']) {
            $error = 'Please verify your email address first. Check your inbox for the verification link. <a href="resend.php?email=' . urlencode($email) . '" style="color:var(--red);">Resend verification email →</a>';
        } elseif (!password_verify($password, $school['password_hash'])) {
            $error = 'Incorrect password. <a href="forgot.php" style="color:var(--red);">Forgot password?</a>';
        } else {
            $_SESSION['school_id']   = $school['id'];
            $_SESSION['school_name'] = $school['school_name'];
            $_SESSION['school_code'] = $school['school_code'];

            db()->prepare("UPDATE schools SET last_login=datetime('now') WHERE id=?")->execute([$school['id']]);
            log_activity($school['id'], 'login', $_SERVER['REMOTE_ADDR'] ?? '');

            header('Location: dashboard.php');
            exit;
        }
    }
}

$msg_text = match($msg) {
    'registered'      => 'Registration successful! Check your email for the verification link.',
    'session_expired' => 'Your session has expired. Please log in again.',
    'activated'       => '✓ Account activated! You can now log in.',
    'logged_out'      => 'You have been signed out.',
    default           => '',
};
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>School Login — Edupro SMS Portal</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
:root { --red:#FF0527; --red-dark:#c8021e; --red-light:#fff0f2; }
body { margin:0; font-family:'Inter',system-ui,sans-serif; background:#f3f4f6; min-height:100vh; display:flex; flex-direction:column; }
.portal-nav { background:#fff; border-bottom:2px solid var(--red); padding:0 32px; height:64px; display:flex; align-items:center; justify-content:space-between; box-shadow:0 2px 8px rgba(0,0,0,.07); }
.portal-nav img { height:40px; }
.portal-nav a { font-size:.85rem; font-weight:600; color:#374151; text-decoration:none; margin-left:16px; }
.portal-nav a:hover { color:var(--red); }
.portal-nav .btn-register { background:var(--red); color:#fff !important; padding:7px 18px; border-radius:8px; }
.login-wrap { flex:1; display:flex; align-items:center; justify-content:center; padding:40px 20px; }
.login-card { background:#fff; border-radius:16px; box-shadow:0 4px 32px rgba(0,0,0,.1); width:100%; max-width:440px; overflow:hidden; }
.login-header { background:linear-gradient(135deg,#1a0a0e,#3d1018); padding:36px 36px 28px; text-align:center; }
.login-header img { height:52px; margin-bottom:16px; }
.login-header h1 { color:#fff; font-size:1.3rem; font-weight:800; margin:0 0 6px; }
.login-header p { color:rgba(255,255,255,.65); font-size:.875rem; margin:0; }
.login-body { padding:32px 36px; }
.form-group { margin-bottom:20px; }
.form-group label { display:block; font-size:.85rem; font-weight:600; color:#374151; margin-bottom:6px; }
.form-group input { width:100%; padding:11px 14px; border:1.5px solid #d1d5db; border-radius:8px; font-size:.95rem; box-sizing:border-box; transition:.15s; }
.form-group input:focus { outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(255,5,39,.1); }
.btn-login { width:100%; padding:13px; background:var(--red); color:#fff; border:none; border-radius:8px; font-size:1rem; font-weight:700; cursor:pointer; transition:.2s; }
.btn-login:hover { background:var(--red-dark); }
.alert { padding:12px 16px; border-radius:8px; font-size:.875rem; margin-bottom:20px; }
.alert a { color:var(--red); font-weight:600; }
.alert-error { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; }
.alert-success { background:#d1fae5; color:#065f46; border:1px solid #6ee7b7; }
.login-links { margin-top:20px; text-align:center; font-size:.875rem; color:#6b7280; }
.login-links a { color:var(--red); font-weight:600; text-decoration:none; }
.login-footer { padding:18px 36px; border-top:1px solid #f3f4f6; text-align:center; }
.login-footer a { font-size:.8rem; color:#9ca3af; text-decoration:none; margin:0 8px; }
.login-footer a:hover { color:var(--red); }
</style>
</head>
<body>

<nav class="portal-nav">
  <a href="../index.html"><img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'"></a>
  <div>
    <a href="../index.html">Home</a>
    <a href="../contact.php">Support</a>
    <a href="register.php" class="btn-register">Register Your School</a>
  </div>
</nav>

<div class="login-wrap">
  <div class="login-card">
    <div class="login-header">
      <img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'">
      <h1>School Portal Login</h1>
      <p>Sign in to your Edupro SMS school dashboard</p>
    </div>
    <div class="login-body">

      <?php if ($msg_text): ?>
      <div class="alert alert-success"><?= htmlspecialchars($msg_text) ?></div>
      <?php endif; ?>

      <?php if ($error): ?>
      <div class="alert alert-error"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" autocomplete="on">
        <div class="form-group">
          <label for="email">School Email Address</label>
          <input type="email" id="email" name="email" required placeholder="school@domain.com"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn-login">Sign In →</button>
      </form>

      <div class="login-links">
        <p>Don't have an account? <a href="register.php">Register your school →</a></p>
        <p style="margin-top:8px;"><a href="forgot.php">Forgot your password?</a></p>
      </div>
    </div>
    <div class="login-footer">
      <a href="../index.html">Home</a>
      <a href="../pricing.html">Pricing</a>
      <a href="../contact.php">Support</a>
      <a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a>
    </div>
  </div>
</div>
</body>
</html>
