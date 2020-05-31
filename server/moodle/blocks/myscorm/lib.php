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
    

    echo 'great (>=75) : '.'<img src="images/green.jpg" height="20" width="20">'.',';  
    echo 'good (>=65) : '.'<img src="images/blue.jpg" height="20" width="20">'.',';
    echo  'ok (>=50) : '.'<img src="images/yellow.jpg" height="20" width="20">'.',';
    echo 'not ok (>=35) : '.'<img src="images/pink.jpg" height="20" width="20">'.',';
    echo  'very bad (>=0) : '.'<img src="images/red.jpg" height="20" width="20">'.','; 
    echo  'not do yet : '.'<img src="images/gray.jpg" height="20" width="20">'.'<br>';
    global $DB,$i;
    $i=1;
    $sql5= "SELECT id,course,name FROM {scorm} WHERE course='$courseid' ;";
    $login5=$DB->get_records_sql($sql5); 
    foreach($login5 as $d=>$va){
        echo '<br>'.$i++.') ';
        echo 'scorm name : '.$va->name.'<br>';
        $c=$va->id;
     
        echo '-----your position-----'.'<br>';

        $sql6= "SELECT *FROM {scorm_scoes_track} WHERE element='cmi.core.score.raw' AND scormid=$c AND userid='$userid';";
        $login6=$DB->get_records_sql($sql6); 
        foreach($login6 as $d=>$va){
                      
            echo 'attempt number: '.$va->attempt.'<br>';
            
            $answer =$va->value;
            if ($answer>=75) {
                echo '<img src="images/green.jpg" height="100" width="100">'.'<br>';   
                echo 'your result is : ';
                echo $answer.'<br>';           
                     
            }
            elseif($answer>=65){
                echo '<img src="images/blue.jpg" height="100" width="100">'.'<br>';
                echo 'your result is : ';
                echo $answer.'<br>';  
                
            }
            elseif($answer>=50){
                echo '<img src="images/yellow.jpg" height="100" width="100">'.'<br>';
                echo 'your result is : ';
                echo $answer.'<br>';  
                
            }
            elseif($answer>=35){
                echo '<img src="images/pink.jpg" height="100" width="100">'.'<br>';
                echo 'your result is : ';
                echo $answer.'<br>';  
               
            }
            elseif($answer>=25){
                echo '<img src="images/red.jpg" height="100" width="100">'.'<br>';
                echo 'your result is : ';
                echo $answer.'<br>';  
               
            }
            else {
                echo '<img src="images/red.jpg" height="100" width="100">'.'<br>';
                echo 'your result is : ';
                echo $answer;  
                
            }
            echo '<br>';
        }

        if(count($login6)==0){

            echo '<img src="images/gray.jpg" height="100" width="100">'.'<br>';
            
        }
    }  
}
