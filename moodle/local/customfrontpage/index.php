<?php
require_once(__DIR__.'/../../config.php');

$PAGE->set_context(context_block::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_url(new moodle_url ('/local/customfrontpage/index.php', array('key' => 'value', 'id' => 3)));
$PAGE->set_title('Custom Front Page');

echo $OUTPUT->header();

$customfrontpagecontext = [
    'summary' => 'Elevate your English skills
    for confident communication!',

    'overview' => "Here's an overview of 
     the course",

     'beginers' => 'Beginners',
   
    'beginersheader' => 'Start your language journey!',
     'beginersinfo' => 'Building essential skills for 
     effective communication!',
    
     'intermediate' => 'Intermediate',
    'intermediateheader' => "Take the next step in your language mastery ",
     'intermediateinfo' => " Elevating your vocabulary, grammar, and 
     communication prowess!",  

    'advanced'=> 'Advanced',
     'advancedheader'=> 'Advance to excellence',
     'advancedinfo' => 'refining complex language, grammar, and communication
      for professional and academic success!'
    
];

echo $OUTPUT->render_from_template('local_customfrontpage/customfrontpage', $customfrontpagecontext);

echo $OUTPUT->footer();
