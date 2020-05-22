<?php

        require_once(dirname(__FILE__) . '/../../config.php');


        function block_myblock_course_context($courseid) { //get login page data
                if (class_exists('context_course')) {
                        return context_course::instance($courseid);
                } else {
                        return get_context_instance(CONTEXT_COURSE, $courseid);
                }
        }
        
        function get_course_data( $id,$type,$uyear,$semester){  //get courses names from course table

                global $DB,$i,$sid,$sc;
                $sc=0;
                $i=0;
                $subject=array();
                                
                $course=$DB->get_records_sql('SELECT id,fullname,shortname,idnumber,category FROM {course} ;');
                $categorys=$DB->get_records_sql('SELECT id,name,parent,coursecount FROM {course_categories};');
        
                if($id==2020){ 
                        if($type==1){ //SCS        
                                foreach ($categorys as $data1=>$value1) {
                                        if($value1->name=='SCS'){
                                                echo $value1->name.'--';
                                                $sid=$value1->id;                       
                                        }else{
                                                if($value1->parent==$sid){                                        
                                                        if($uyear==1 && $value1->name=='1 st Year'){
                                                                echo $value1->name.'--';
                                                                $sid=$value1->id;
                                                                foreach($categorys as $data2=>$value2){
                                                                        if($value2->parent==$sid){
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>';                                                                                         
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break;    
                                                                                }                                               
                                                                        }
                                                                }
                                                                break;                                                
                                                        }
                                                        elseif($uyear==2 && $value1->name=='2 nd Year'){
                                                                echo $value1->name.'--';
                                                                $sid=$value1->id;
                                                                foreach($categorys as $data2=>$value2){
                                                                        if($value2->parent==$sid){
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;                                                                                               
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;                                                                                               
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break;    
                                                                                }                                               
                                                                        }
                                                                }
                                                                break;
                                                        }
                                                        elseif($uyear==3 && $value1->name=='3 rd Year'){
                                                                echo $value1->name.'--';
                                                                $sid=$value1->id;
                                                                foreach($categorys as $data2=>$value2){
                                                                        if($value2->parent==$sid){
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break;    
                                                                                }                                               
                                                                        }
                                                                }
                                                                break;
                                                        }
                                                        elseif($uyear==4 && $value1->name=='4 th Year'){
                                                                echo $value1->name.'--';
                                                                $sid=$value1->id;
                                                                foreach($categorys as $data2=>$value2){
                                                                        if($value2->parent==$sid){
                                                                                if($semester==1 && $value2->name=='1 st Semester')    {
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $a=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
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
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
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
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>';
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
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
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
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
                                                                                if($semester==1 && $value2->name=='1 st Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>'; 
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
                                                                                        break; 
                                                                                }
                                                                                if($semester==2 && $value2->name=='2 nd Semester'){
                                                                                        echo $value2->name.'--'.$value2->id.'<br>';
                                                                                        foreach($course as $b=>$s1){
                                                                                                if($s1->category==$value2->id){
                                                                                                        $subject[$sc]=$s1->id;
                                                                                                        $sc++;
                                                                                                }
                                                                                        }
                                                                                        return get_login_data($subject);
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
               
        };

        function get_login_data($s){

                global $DB,$countuser,$countr,$X, $OUTPUT,$name;

               
                $countuser=0;
                $countr=0;
                $name='';    
                $data=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
                $labe2=array('1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','14th','15th','16th',
                        '    17th','18th','19th','20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th','30th','31st');
                $chart = new \core\chart_line();   
                $cours=$DB->get_records_sql('SELECT id,fullname,idnumber FROM {course}');

                foreach($s as $a){
                        $X=0;
                        echo $a.'<br>';
                        foreach($labe2 as $date){
                                $sql6= "SELECT   COUNT(userid) AS 'countusers' ,DATE_FORMAT(FROM_UNIXTIME(timecreated),'%D') AS 'day', courseid           
                                        FROM {logstore_standard_log} 
                                        WHERE action='viewed' AND courseid=$a AND MONTH(FROM_UNIXTIME(timecreated))='5' AND  DAY(FROM_UNIXTIME(timecreated))='$date' ;";
                                $login6=$DB->get_records_sql($sql6); 
                                
                                foreach($login6 as $f=>$va){
                                        if($va->countusers!=0){
                                                $data[$X]=$va->countusers;
                                                $X++;  
                                        } 
                                        else{
                                               $data[$X]=$va->countusers;
                                                $X++;  
                                        }                                                               
                                }                               
                        } 
                        foreach ($cours as $o=>$valu){
                                if($valu->id==$a){
                                        $name=$valu->fullname.' ( '.$valu->idnumber.' )' ;
                                }
                        }
                       $series = new \core\chart_series($name.'<br>', $data);
                       $chart->add_series($series);
                      
                } 

                $chart->set_labels($labe2);
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
