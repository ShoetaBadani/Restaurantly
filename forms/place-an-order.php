<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $Place_an_order = new PHP_Email_Form;
  $Place_an_order->ajax = true;
  
  $Place_an_order->to = $receiving_email_address;
  $Place_an_order->from_name = $_POST['name'];
  $Place_an_order->from_email = $_POST['email'];
  $Place_an_order->subject = "place an order request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $book_a_table->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $Place_an_order->add_message( $_POST['name'], 'Name');
  $Place_an_order->add_message( $_POST['email'], 'Email');
  $Place_an_order->add_message( $_POST['phone'], 'Phone', 4);
  $Place_an_order->add_message( $_POST['date'], 'Date', 4);
  $Place_an_order->add_message( $_POST['time'], 'Time', 4);
  $Place_an_order->add_message( $_POST['people'], '# of people', 1);
  $Place_an_order->add_message( $_POST['message'], 'Message');

  echo $Place_an_order->send();
?>
