<?php

require_once(dirname(__FILE__) . '/../../config.php');

function block_myblock_course_context($courseid) { //get login page data
    if (class_exists('context_course')) {
        return context_course::instance($courseid);
    } else {
        return get_context_instance(CONTEXT_COURSE, $courseid);
    }
}


function report_log_print_graph() { //draw line chart
    global  $OUTPUT;
 
    $chart = new \core\chart_line();
    $label=get_course_data();
    $data=array(  array('11','15','50','1','11','9','1'),
                  array('19','17','39','11','11','5','10'),
                  array('11','15','40','10','18','7','1'),
                  array('13','16','30','5','11','8','16')   );
    $logs['labels']=array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
    
    for($x=0; $x<count($data); $x++){
        $series2 = new \core\chart_series($label[$x], $data[$x]);
        $chart->add_series($series2);
    }
   
    $chart->set_labels($logs['labels']);
    $yaxis = $chart->get_yaxis(0, true);
    $yaxis->set_label('numer of logins');
   
    echo $OUTPUT->render($chart);
}

function get_course_data( ){  //get courses names from course table

    global $CFG,$DB,$i;
    $label=array();
    $i=0;
   
    $course=$DB->get_records_sql('SELECT fullname,startdate,shortname FROM {course};'); 
   
    foreach ($course as $c=>$fullname) {
        if($fullname->shortname!='VLE'){
            $label[$i] =$fullname->shortname;
            $i++;
        }             
    }
  
    return $label;
};

function get_login_data(){

    global $DB,$countuser,$countr,$X, $OUTPUT,$name;
    $countuser=0;
    $countr=0;
    $name='';
 

    $sql5= "SELECT COUNT(userid) AS 'countusers', courseid, 
            DATE_FORMAT(FROM_UNIXTIME(timecreated),'%M') AS 'month' 
            FROM {logstore_standard_log} 
            WHERE action='viewed'  
                  AND YEAR(FROM_UNIXTIME(timecreated))='2020' 
            GROUP BY courseid, MONTH(FROM_UNIXTIME(timecreated));";
   $login5=$DB->get_records_sql($sql5); 

    
   // echo count($login5).'<br>';
     
  $label=array('January','February','March','April','May',
             'June','July','August','September','October','November','December');
    
  $data=array(0,0,0,0,0,0,0,0,0,0,0,0);

   
  $X=0;
   foreach ($login5 as $c5=>$val5) { 
        if($val5->courseid==1 ){
          //  echo $val5->courseid.'<br>';
            for($i=0;$i<12;$i++){
                if($val5->month==$label[$i]){
                    $X=$i;
                      $data[$i]=$val5->countusers;
                     // echo $label[$i]."------>".$data[$i].'<br>' ;
                     // echo $i.'<br>';
                }
                else{
                    if($i!=$X){
                        $data[$i]=0;
                   // echo $label[$i]."------>".$data[$i].'<br>' ;
                   // echo $i.'<br>';
                    }else{
                        //echo $label[$i]."------>".$data[$i].'<br>' ;
                       // echo $i.'<br>';
                    }
                   
                }
            }
           
           
       }      
         
    } 
    $sq="SELECT id,shortname,fullname FROM {course} WHERE id=1;";
    $d=$DB->get_records_sql($sq); 
    foreach($d as $q=>$short){
       $name=$short->shortname;
    }
    // echo $name;
    $chart = new \core\chart_line();
   // $label=get_course_data();
   
    
   
        $series = new \core\chart_series($name, $data);
        $chart->add_series($series);
   
   
    $chart->set_labels($label);
    $yaxis = $chart->get_yaxis(0, true);
    $yaxis->set_label('numer of logins');
   
    echo $OUTPUT->render($chart);
     
    

}
