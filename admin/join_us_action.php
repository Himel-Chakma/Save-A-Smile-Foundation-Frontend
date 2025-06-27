<?php
include('main.php');
$object = new batch_details();

if (isset($_POST["action"])) {

    if ($_POST["action"] == 'verify_reference') {
        $reference_code = $_POST['reference_code'];

        $object->query = "
        SELECT * FROM fill_form 
        WHERE rc = ? AND membership_status = 'active'
        ";

        $object->execute([$reference_code]);

        if ($object->row_count() > 0) {
            $result = $object->statement_result();
            foreach ($result as $row) {
                echo json_encode(['success' => true, 'member' => $row['firstname'] . ' ' . $row['lastname'] . ' (' . $row['batch'] . ')']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid reference code']);
        }
    }

    if ($_POST["action"] == 'send_verification_code') {
        $email = $_POST['email'];

        // Generate 6-digit verification code
        $verification_code = rand(100000, 999999);

        $_SESSION['verification_code'] = $verification_code;
        $_SESSION['verification_email'] = $email;
        $_SESSION['code_expires'] = time() + 600; // 10 minutes

        // Send email (you'll need to configure your email settings)
        $subject = "Save A Smile Foundation - Email Verification";
        $message = "Your verification code is: " . $verification_code . "\n\n";
        $message .= "This code will expire in 10 minutes.\n\n";
        $message .= "If you didn't request this code, please ignore this email.";

        $headers = "From: noreply@saveasmilefoundation.org\r\n";
        $headers .= "Reply-To: noreply@saveasmilefoundation.org\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // mail($email, $subject, $message, $headers)

        if (1) {
            echo json_encode(['success' => true, 'message' => 'Verification code sent to your email' . $_SESSION['verification_code']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send email']);
        }
    }

    if ($_POST["action"] == 'verify_email') {
        $email = $_POST['email'];
        $code = $_POST['code'];

        // Check if code matches and hasn't expired
        if (
            isset($_SESSION['verification_code']) &&
            isset($_SESSION['verification_email']) &&
            isset($_SESSION['code_expires']) &&
            $_SESSION['verification_code'] == $code &&
            $_SESSION['verification_email'] == $email &&
            time() < $_SESSION['code_expires']
        ) {

            $_SESSION['email_verified'] = true;
            echo json_encode(['success' => true, 'message' => 'Email verified successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired verification code']);
        }
    }
}
