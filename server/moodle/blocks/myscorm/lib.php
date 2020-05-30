<?php

require_once(dirname(__FILE__) . '/../../config.php');

function block_myscorm_course_context($courseid) { //get login page data
    if (class_exists('context_course')) {
        return context_course::instance($courseid);
    } else {
        return get_context_instance(CONTEXT_COURSE, $courseid);
    }
}


function get_login_datas($courseid,$userid ){

    global $DB;

    $sql5= "SELECT id,course,name FROM {scorm} WHERE course='$courseid' ;";
    $login5=$DB->get_records_sql($sql5); 
    foreach($login5 as $d=>$va){

        echo 'scorm name : '.$va->name.'<br>';
        $c=$va->id;
     
        echo '------------------------------------your feedback-------------------------------'.'<br>';

        $sql6= "SELECT *FROM {scorm_scoes_track} WHERE element='cmi.core.score.raw' AND scormid=$c AND userid='$userid';";
        $login6=$DB->get_records_sql($sql6); 
        foreach($login6 as $d=>$va){
                      
            echo 'scoid: '.$va->scoid.' <br> '.'attempt number: '.$va->attempt.'<br>';
            
            $answer =$va->value;
            if ($answer>=75) {
                echo 'You are grate,  your result is : ';
                echo $answer.'<br>';           
                echo '<img src="images/green.jpg" height="200" width="100">';        
            }
            elseif($answer>=65){
                echo 'You are good,  your result is : ';
                echo $answer.'<br>';  
                echo '<img src="images/green.jpg" height="200" width="100">';
            }
            elseif($answer>=50){
                echo 'You are ok,  your result is : ';
                echo $answer.'<br>';  
                echo '<img src="images/yellow.jpg" height="200" width="100">';
            }
            elseif($answer>=35){
                echo 'You are not ok,  your result is : ';
                echo $answer.'<br>';  
                echo '<img src="images/yellow.jpg" height="200" width="100">';
            }
            elseif($answer>=25){
                echo 'You are bad,  your result is : ';
                echo $answer.'<br>';  
                echo '<img src="images/red.jpg" height="200" width="100">';
            }
            else {
                echo 'You are very bad,  your result is : ';
                echo $answer.'<br>';  
                echo '<img src="images/red.jpg" height="200" width="100">';
            }
            echo '<br>';
        }

        if(count($login6)==0){
            echo 'you did not do any attempt to this scorm. please do it';
        }
    }  
}
