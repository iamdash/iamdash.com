<?php

include 'functions.php';
if (isset($_POST['user_submit']) && $_POST['user_submit']==1) {
     sleep(3);
     processReg($_POST);
}

/**
 * 	@name	processReg()
 * 	@desc	Processes the posted data
 * 	@return JSON string containing errors, error message or success message
 * ______________________________________________________________________________________ */
function processReg($data) {
     $r = array();
     if (isset($_POST['user_submit'])) {
          $data['email'] = trim(mysql_real_escape_string($_POST['email']));
          $data['name'] = trim(mysql_real_escape_string($_POST['name']));
          $data['message'] = trim(mysql_real_escape_string($_POST['message']));
          if (!(checkEmailField($data['email']))) {
               $r['success'] = 0;
               $r['message'] = 'Please enter a valid email address';
          } else {
               if (insertData($data)) {
                    if (!sendConfirmEmail($data)) {
                         $r['success'] = 0;
                         $r['message'] = 'An error has occurred. Please try again';
                    } else {
                         $r['success'] = 1;
                         $r['message'] = 'Thanks for your message. I will be in touch soon.';
                    }
               }
          }
          if (isAjax()) {
               $result = json_encode($r);
               echo $r['message'];
               exit();
          } else {
               return $r;
          }
     } else {
          return false;
     }
}

/**
 * 	@name	insertData()
 * 	@desc	Inserts the data into the database
 * 	@return bool true or false on success or failure
 * ______________________________________________________________________________________ */
function insertData($data) {

     db('on');
     $s = 'INSERT INTO 
				tbl_messages 
				SET
          name = "' . $data['name'] . '",
          email = "' . $data['email'] . '",
          message = "' . $data['message'] . '",
          date_sent = NOW()';

     if (mysql_query($s)) {

          return true;
     } else {
          return false;
     }
     db('off');
}

/**
 * 	Checks valid fields
 * 	@desc Checks that the email field is not empty, if not, checks fora valid email address
 * 	@return bool
 * ______________________________________________________________________________________ */
function checkEmailField($email_address) {
     $error = false;
     if ($email_address == '') {
          $error = true;
     } else {
          if (!checkEmail($email_address)) {
               $error = true;
          }
     }

     if ($error) {
          return false;
     } else {
          return true;
     }
}

/**
 * 	Check for a valid email address
 * ______________________________________________________________________________________ */
function checkEmail($email) {
     // First, we check that there's one @ symbol, and that the lengths are right
     if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
          // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
          return false;
     }
     // Split it into sections to make life easier
     $email_array = explode("@", $email);
     $local_array = explode(".", $email_array[0]);
     for ($i = 0; $i < sizeof($local_array); $i++) {
          if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
               return false;
          }
     }
     if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
          // Check if domain is IP. If not, it should be valid domain name
          $domain_array = explode(".", $email_array[1]);
          if (sizeof($domain_array) < 2) {
               return false; // Not enough parts to domain
          }
          for ($i = 0; $i < sizeof($domain_array); $i++) {
               if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                    return false;
               }
          }
     }
     return true;
}

/**
 * 	@name isAjax()
 * 	@desc Checks if a request was made via ajax or not
 * 	@return bool
 * ______________________________________________________________________________________ */
function isAjax() {
     return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
}

/**
 * 	Send signup confirmation to the user
 * ______________________________________________________________________________________ */
function sendConfirmEmail($data) {

     $admin_email = 'sayhello@iamdash.net';

     $random_hash = md5(date('r', time()));

     $headers .= "From: iamdash.net <sayhello@iamdash.net>\n";
     $headers .= "Reply-To: <sayhello@iamdash.net>\n";
     $headers .= "X-Sender: <sayhello@iamdash.net>\n";
     $headers .= "'X-Mailer: PHP/" . phpversion() . "\n";

     $admin_body = "New message from iamdash.net\n\n";
     $admin_body .= "Name: " . $data['name'] . "\n\n";
     $admin_body .= "Email address: " . $data['email'] . "\n\n";
     $admin_body .= "Message: " . $data['message'] . "\n\n";
     
     $admin_body .= "IP address: " . $_SERVER['REMOTE_ADDR'] . "\n\n";
     $admin_body .= "Sent from : " . getenv('HTTP_HOST');

     //Unsubscribe.

     if (!mail($admin_email, 'New message from iamdash.net', $admin_body, $headers)) {
          return false;
     }else{
          return true;
     }
}

?>
