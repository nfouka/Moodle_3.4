<?php
/**
 * Created by PhpStorm.
 * User: nadir
 * Date: 17/01/18
 * Time: 18:37
 */


require_once('../../config.php');
global $CFG, $PAGE , $DB;

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Form name');
$PAGE->set_heading('Form name');
$PAGE->set_url($CFG->wwwroot.'/local/myform/index.php');
echo $OUTPUT->header();

?>


<div id="div2" style="font-size: 30px;color: orangered"></div>
<div id="loaded" style="font-size: 30px;color:red"></div>

<div id="progressbar" style="border:1px solid #ccc; border-radius: 5px; "></div>

<?php


$record1 = new stdClass();
$total = 20005 ;
for($i=0 ; $i <= $total; $i++) {

    $record1->name = $_GET['firstname'] . rand(0, 98898);
    $record1->displayorder = $_GET['subject']. rand(0, 98898);
    $record2 = new stdClass();
    $record2->name = $_GET['firstname'] . rand(0, 98898);
    $record2->displayorder = $_GET['subject'] . rand(0, 98898);
    $records = array($record1, $record2);
    $DB->insert_records('quiz_report', $records);
    $percent = intval($i/$total * 100)."%";

    ?>

    <script>

        <?php if($i<$total) { ?>
        document.getElementById("progressbar").innerHTML =
            "<div style= 'width:  <?php echo $percent; ?>  ;background-color:#337AB7;height:120px;text-align:center;color:white;font-size:80px;'><?php echo $percent; ?></div>";
            <?php }else{ ?>

            document.getElementById("progressbar").innerHTML =
                "<div style= 'width:  <?php echo $percent; ?>  ;background-color:green ;height:120px;text-align:center;color:white;font-size:80px;'><?php echo $percent; ?></div>";
        <?php } ?>
    </script>

    <?php

    flush();
    ob_flush();

}
    ?>
    <script>
        document.getElementById('div2').innerHTML = '' ;
        document.getElementById('loaded').innerHTML = 'Entities load successely' ;
    </script>


    <?php

    echo $OUTPUT->footer();
?>
