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
    
    // If there is a mailchimp config file, load it and send this request to the MailChimp 2.0 API
    $mailChimp = parse_ini_file('mailchimp.ini');
    if ($mailChimp !== FALSE) {
        // Grab the last three characters of the key for the server
        $url = "https://{$mailChimp['server']}.api.mailchimp.com/2.0/lists/subscribe.json";
        // Setup the data to pass
        $data = array(
            'apikey' => $mailChimp['key'],
            'id' => $mailChimp['list'],
            'email' => array('email' => $_REQUEST['email'])
        );
        // Build a parameter list from the data
        $postData = http_build_query($data);
        // Pass the data to mailchimp (GET)
        $result = file_get_contents($url . '?' . $postData);
    }
    
    // Show the output
    echo "SAVED";

?>