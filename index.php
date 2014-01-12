<?php

    // Verify the data
    $required = array('from','email');
    
    // Make sure none of the required fields are blank
    foreach($required as $r) {
        if( empty($_REQUEST[$r]) ) {
            die('ERROR: Invalid data.');
        }
    }
    
    // Setup the CSV line
    $line = DATE('Y-m-d') . ',' . $_REQUEST['from'] . ',' . $_REQUEST['email'];
    
    // Write this email
    file_put_contents('users.csv', $line);
    
    // Show the output
    echo "SAVED";

?>