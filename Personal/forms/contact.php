<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'yuvannanish15@example.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact = new PHP_Email_Form;
    $contact->ajax = true;

    $contact->to = $receiving_email_address;
    $contact->from_name = htmlspecialchars($_POST['name']);
    $contact->from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $contact->subject = htmlspecialchars($_POST['subject']);

     #Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    
    $contact->smtp = array(
        'host' => 'smtp.gmail.com',
        'username' => 'yyuvannanish15@gmail.com',
        'password' => 'yuvan_123',
        'port' => '587'
    );
    

    $contact->add_message($_POST['name'], 'From');
    $contact->add_message($_POST['email'], 'Email');
    $contact->add_message($_POST['message'], 'Message', 10);

    echo $contact->send();
}
?>
