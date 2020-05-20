<?php

require_once(dirname(__FILE__) . '/../../config.php');
//require_once($CFG->dirroot.'/blocks/myblock/styles.css');

function block_myblock_course_context($courseid) { //get login page data
    if (class_exists('context_course')) {
        return context_course::instance($courseid);
    } else {
        return get_context_instance(CONTEXT_COURSE, $courseid);
    }
}


 function report_log_print_graph($id,$type,$uyear,$semester) { //draw line chart
    global  $OUTPUT;
    
    $chart = new \core\chart_line();
    $label=get_course_data($id,$type,$uyear,$semester);
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

 function get_course_data( $id,$type,$uyear,$semester){  //get courses names from course table

    global $CFG,$DB,$i,$sid;
//     $q="DELETE FROM {logstore_standard_log} WHERE courseid >0;";
//     $deletes=$DB->get_records_sql($q);
    //echo $deletes.'<br>';
    $label=array();
    $i=0;
    $course=$DB->get_records_sql('SELECT id,fullname,shortname,idnumber,category FROM {course} ;');
    
if($id==2020){ 
    if($type==1){ //SCS        
          $categorys1=$DB->get_records_sql('SELECT id,name,parent,coursecount FROM {course_categories} ;');
          foreach ($categorys1 as $data1=>$value1) {
                  if($value1->name=='SCS'){
                          echo $value1->name.'--';
                      $sid=$value1->id;                       
                  }else{
                        if($value1->parent==$sid){
                              
                                if($uyear==1 && $value1->name=='1 st Year'){
                                        echo $value1->name.'--';
                                        $sid=$value1->id;
                                         foreach($categorys1 as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 

                                                                 foreach($course as $a=>$s1){
                                                                         if($s1->category==$value2->id){
                                                                                echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                        echo '<br>';
                                                                         }
                                                                 }

                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                       
                                }
                                elseif($uyear==2 && $value1->name=='2 nd Year'){
                                        echo $value1->name.'--';
                                        $sid=$value1->id;
                                         foreach($categorys1 as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                elseif($uyear==3 && $value1->name=='3 rd Year'){
                                        echo $value1->name.'--';
                                        $sid=$value1->id;
                                         foreach($categorys1 as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                elseif($uyear==4 && $value1->name=='4 th Year'){
                                        echo $value1->name.'--';
                                        $sid=$value1->id;
                                         foreach($categorys1 as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $a=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                
                        }
                  }             
           }   
     }else{ //IS
        $categorys=$DB->get_records_sql('SELECT id,name,parent,coursecount FROM {course_categories};');
        foreach ($categorys as $data=>$value) {
                if($value->name=='IS'){
                        echo $value->name.'--';
                        $sid=$value->id;                       
                }else{
                        if($value->parent==$sid){
                              
                                if($uyear==1 && $value->name=='1 st Year'){
                                        echo $value->name.'--';
                                        $sid=$value->id;
                                         foreach($categorys as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                       
                                }
                                elseif($uyear==2 && $value->name=='2 nd Year'){
                                        echo $value->name.'--';
                                        $sid=$value->id;
                                         foreach($categorys as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>';
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                } 
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                elseif($uyear==3 && $value->name=='3 rd Year'){
                                        echo $value->name.'--';
                                        $sid=$value->id;
                                         foreach($categorys as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                elseif($uyear==4 && $value->name=='4 th Year'){
                                        echo $value->name.'--';
                                        $sid=$value->id;
                                         foreach($categorys as $data2=>$value2){
                                                if($value2->parent==$sid){
                                                       if($semester==1 && $value2->name=='1 st Semester')    {
                                                                echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                }
                                                        break; 
                                                        }
                                                        if($semester==2 && $value2->name=='2 nd Semester'){
                                                                echo $value2->name.'--'.$value2->id.'<br>';
                                                                foreach($course as $b=>$s1){
                                                                        if($s1->category==$value2->id){
                                                                               echo $s1->id.'--'.$s1->fullname.'--'.$s1->shortname.'--'.$s1->idnumber.'--'.$s1->category ;
                                                                                       echo '<br>';
                                                                        }
                                                                } 
                                                        break;    
                                                        }                                               
                                                }
                                         }
                                        break;
                                }
                                
                        }
                }
        }  
      }
}
      get_login_data();

     
//      foreach ($course as $data=>$value) {
//         echo $value->id.'--'.$value->fullname.'--'.$value->shortname.'--'.$value->idnumber.'--'.$value->category ;
//         echo '<br>';
//     }
//  echo 'id'.'--'.'parent'.'--'.'count course'.'--'.'name'.'<br>' ;
//  foreach ($categorys as $data=>$value) {
//              //   echo $value->id.'--'.$value->parent.'--'.$value->coursecount.'--'.$value->name ;
//                 echo '<br>';
//            }
   
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

    $sql6= "SELECT COUNT(userid) AS 'countusers',  
             DATE_FORMAT(FROM_UNIXTIME(timecreated),'%D') AS 'day' 
             FROM {logstore_standard_log} 
             WHERE action='viewed' AND courseid=1 
                   AND MONTH(FROM_UNIXTIME(timecreated))='5' 
            GROUP BY DAY(FROM_UNIXTIME(timecreated));";
    $login6=$DB->get_records_sql($sql6); 
      echo count($login6).'<br>';
    foreach($login6 as $f=>$va){
        echo $va->day.'---'.$va->countusers.'<br>';
    }

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


function button($id,$courseid,$userid){   
        
        echo' <ul class="dropdown">';       
                echo'<li >';echo'<button  class="dropbtn btn btn-secondary dropdown-toggle" data-toggle="dropdown">';echo'Academic Year 2020';echo'</button>';
                        echo' <ul class="dropdown-content">';           
                                echo' <li>';echo'<label class="dropdown-toggle" data-toggle="dropdown">';echo'SCS';echo'</label>';
                                        echo' <ul>';
                                                echo'<li >';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'1 st Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=1 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=1 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo'</ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'2 nd Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=2 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=2 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'3 rd Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=3 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=3 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'4 th Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=4 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=1 && uyear=4 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                        echo'</ul>';
                                echo'</li>';
                                echo' <li>';echo'<label class="dropdown-toggle"  data-toggle="dropdown">';echo'IS';echo'</label>';
                                        echo' <ul>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'1 st Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=1 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=1 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'2 nd Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=2 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=2 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'3 rd Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=3 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=3 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'4 th Year';echo'</a>';
                                                        echo' <ul>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=4 && semester=1">';echo'1 st Semester';echo'</a>';echo'</li>';
                                                                echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=2020 && type=2 && uyear=4 && semester=2">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                                        echo' </ul>';
                                                echo'</li>';
                                        echo'</ul>';
                                echo'</li>';
                        echo'</ul>';
                echo'</li>';       
        echo'</ul>';
}
