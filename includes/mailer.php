<?php
/**
 * Edupro SMS — Lightweight SMTP Mailer
 * Sends via SSL (port 465) without requiring Composer or PHPMailer.
 * Works on standard cPanel / ZimHPC shared hosting.
 */

require_once __DIR__ . '/config.php';

/**
 * Send an email via SMTP.
 *
 * @param string $smtpUser   The FROM address (also the SMTP login username)
 * @param string $smtpPass   The SMTP password for that mailbox
 * @param string $to         Recipient address
 * @param string $subject    Email subject
 * @param string $body       Plain-text body
 * @param string $replyTo    Optional Reply-To address
 * @return bool
 */
function edupro_send_mail(
    string $smtpUser,
    string $smtpPass,
    string $to,
    string $subject,
    string $body,
    string $replyTo = ''
): bool {

    $host    = SMTP_HOST;
    $port    = SMTP_PORT;
    $fromName = MAIL_FROM_NAME;

    // Open SSL socket to port 465 (SMTPS)
    $errno  = 0;
    $errstr = '';
    $socket = @stream_socket_client(
        "ssl://{$host}:{$port}",
        $errno,
        $errstr,
        15,
        STREAM_CLIENT_CONNECT
    );

    if (!$socket) {
        error_log("Edupro Mailer: Could not connect to {$host}:{$port} — {$errstr}");
        return false;
    }

    stream_set_timeout($socket, 15);

    $read = function () use ($socket): string {
        $data = '';
        while ($line = fgets($socket, 515)) {
            $data .= $line;
            if ($line[3] === ' ') break; // end of multi-line response
        }
        return $data;
    };

    $send = function (string $cmd) use ($socket, $read): string {
        fwrite($socket, $cmd . "\r\n");
        return $read();
    };

    // SMTP conversation
    $read(); // 220 greeting

    $send("EHLO " . gethostname());
    $send("AUTH LOGIN");
    $send(base64_encode($smtpUser));
    $resp = $send(base64_encode($smtpPass));

    if (strpos($resp, '235') === false) {
        error_log("Edupro Mailer: AUTH failed for {$smtpUser} — {$resp}");
        fclose($socket);
        return false;
    }

    $send("MAIL FROM:<{$smtpUser}>");
    $send("RCPT TO:<{$to}>");

    // Also CC replyTo as a recipient so it lands in sales inbox
    if ($replyTo && $replyTo !== $smtpUser) {
        // (don't send to reply-to; just set the header)
    }

    $send("DATA");

    // Build RFC 2822 message
    $boundary = md5(uniqid());
    $headers  = "From: {$fromName} <{$smtpUser}>\r\n";
    $headers .= "To: {$to}\r\n";
    if ($replyTo) $headers .= "Reply-To: {$replyTo}\r\n";
    $headers .= "Subject: " . mb_encode_mimeheader($subject, 'UTF-8', 'B') . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: quoted-printable\r\n";
    $headers .= "X-Mailer: EduproSMS/1.0\r\n";
    $headers .= "Date: " . date('r') . "\r\n";

    $encodedBody = quoted_printable_encode($body);
    // Escape leading dots (RFC 2821)
    $encodedBody = str_replace("\n.", "\n..", $encodedBody);

    $resp = $send($headers . "\r\n" . $encodedBody . "\r\n.");

    $send("QUIT");
    fclose($socket);

    if (strpos($resp, '250') === false) {
        error_log("Edupro Mailer: DATA rejected — {$resp}");
        return false;
    }

    return true;
}

/**
 * Convenience wrapper — send from the SALES mailbox.
 */
function mail_sales(string $to, string $subject, string $body, string $replyTo = ''): bool {
    return edupro_send_mail(SMTP_SALES_USER, SMTP_SALES_PASS, $to, $subject, $body, $replyTo);
}

/**
 * Convenience wrapper — send from the SUPPORT mailbox.
 */
function mail_support(string $to, string $subject, string $body, string $replyTo = ''): bool {
    return edupro_send_mail(SMTP_SUPPORT_USER, SMTP_SUPPORT_PASS, $to, $subject, $body, $replyTo);
}
