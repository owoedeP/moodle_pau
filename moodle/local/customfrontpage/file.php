/* This is the PHP 



// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Listing of the course administration pages for this course.
 *
 * @copyright 2016 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later */
 
// setting config file, this code locates the config file 
//using the _DIR_ function
require_once(__DIR__ ."/../../config.php");

global $USER;

//setting up page url and context
$PAGE->set_url(new moodle_url ('/local/home/manage.php', array('key' => 'value', 'id' => 3)));
$PAGE->set_context(get_system_context());;
$PAGE->set_pagelayout('admin');
$PAGE -> set_title (title: 'home');
$beginersimage = imagecreatefromjpeg('/local/home/images/beginers.jpg');

//linking the required scss file to the page
$PAGE -> requires -> css(new moodle_url('/local/home/css/front.css'));

//Moodle core output renderer to output the header and footer on the page
echo $OUTPUT -> header();

if (isloggedin() && !isguestuser()) {
    $firstname = $USER->firstname;
    echo "<h5 class= 'welcome'>" . "Welcome, $firstname!" . "</h5>";
    
} 
else if (!isloggedin()){
    echo "Welcome to our English Literacy Course. 
    Login to start your journey";
}

    


$templatecontext = (object)[
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


echo $OUTPUT -> render_from_template ('local_home/manage', $templatecontext);

echo $OUTPUT -> footer(); 

This is the Mustache
{{!
    This file is part of Moodle - http://moodle.org/

    Moodle is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Moodle is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
}}

{{!
    @template local_home/manage

    Example context (json):
    {

    }
}}

<div class="beginers-summary">{{summary}}</div>
<div class="overview">{{overview}}</div>
<div>

<div class="course-blocks">

    <div class="beginers-course-info1">
        <div class="beginers-head">{{beginers}}</div>
        <div class= "beginersheader">{{beginersheader}}</div>
        <div class= "beginersinfo">{{beginersinfo}}</div>
    </div>

    
    <div class="beginers-course-info2">
        <div class="beginers-head">{{intermediate}}</div>
        <div class= "beginersheader">{{intermediateheader}}</div>
        <div class= "beginersinfo">{{beginersinfo}}</div>
    </div>


    <div class="beginers-course-info3">
        <div class="beginers-head">{{advanced}}</div>
        <div class= "beginersheader">{{advancedheader}}</div>
        <div class= "beginersinfo">{{intermediateinfo}}</div>
    </div>

</div>

<div class=buttonelement>
    <a><button href="http://127.0.0.1/moodle4.1/moodle/?redirect=0">
        Take Benchmark test
    </button></a>
</div>
