<?php

require_once('../../config.php');
global $CFG, $PAGE;

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Form name');
$PAGE->set_heading('Form name');
$PAGE->set_url($CFG->wwwroot.'/local/myform/index.php');
echo $OUTPUT->header();

?>

<div class="container">
    <form action="send.php">

        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="country">Country</label>
        <select id="country" name="country">
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
        </select>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px ; width:500px;"></textarea>
        <br/>
        <input type="submit" value="Submit">

    </form>
</div>

<?php


echo $OUTPUT->footer();

?>
