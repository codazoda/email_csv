<?php

    // Verify the data
    $required = array('from');
    
    // Make sure none of the required fields are blank
    foreach($required as $r) {
        if( empty($_REQUEST[$r]) ) {
            die('ERROR: Invalid data.');
        }
    }
    
    // Setup the CSV line
    $line = DATE('Y-m-d') . ',' . $_REQUEST['from'] . ',' . $_REQUEST['os'] . ',' . $_REQUEST['email'] . "\n";
    
    // Write this email to the CSV
    file_put_contents('users.csv', $line, FILE_APPEND);
    
    // Compose an email
    /*
    $message = file_get_contents($_REQUEST['from'] . '.txt');
    if (!empty($message)) {
        mail($_REQUEST['email'], $_REQUEST['from'] . ' Registration', $message);
    }
    */
    
    // Show the output
    echo "SAVED";

?>