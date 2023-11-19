<?php
//include simplehtml_form.php

require_once('../config.php');
global $CFG, $DB, $USERS;
require_once($CFG->dirroot.'/test/form.php');

echo $OUTPUT -> header();
//Instantiate simplehtml_form
$mform = new simplehtml_form();


//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    echo "You have clicked on cancel";
    //Handle form cancel operation, if cancel button is present on form
} else if ($fromform = $mform->get_data()) {
    print_r($fromform);

    //my code for inserting into database
    $data = new stdClass;
    $data -> email = $fromform -> email;
    $data -> added_time = time();
    $data -> added_by = $USER -> id;

    $DB->insert_record('mdl_email_input', $data);
  //In this case you process validated data. $mform->get_data() returns data posted in form.


  //id, email, added_time, and added_by

  

} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.


  //Set default data (if any)
  $mform->set_data($toform);
  //displays the form
  $mform->display();
}
