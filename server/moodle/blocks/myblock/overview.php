<?php

    require_once(dirname(__FILE__) . '/../../config.php');
    require_once($CFG->dirroot.'/blocks/myblock/lib.php');
    

    define('USER_SMALL_CLASS', 20);   
    define('USER_LARGE_CLASS', 200);  
    define('DEFAULT_PAGE_SIZE', 20);
    define('SHOW_ALL_PAGE_SIZE', 5000);

    $id       = required_param('logingraphid', PARAM_INT);
    $courseid = required_param('courseid', PARAM_INT);
    $userid   = required_param('userid',PARAM_INT);
    $page     = optional_param('page', 0, PARAM_INT); 
    $perpage  = optional_param('perpage', DEFAULT_PAGE_SIZE, PARAM_INT); 
    $group    = optional_param('group', 0, PARAM_INT); 

    $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
    $context = block_myblock_course_context($courseid);

    $loginblock = $DB->get_record('block_instances', array('id' => $id), '*', MUST_EXIST);
    $loginsconfig = unserialize(base64_decode($loginblock->configdata));

    $PAGE->set_course($course);

    $PAGE->set_url(
        '/blocks/myblock/overview.php',
        array(
            'logingraphid' => $id,
            'courseid' => $courseid,
            'page' => $page,
            'perpage' => $perpage,
            'group' => $group,
        )
    );

    $PAGE->set_context($context);
    $title = 'Overview of students';
    $PAGE->set_title($title);
    $PAGE->set_heading($title);
    $PAGE->navbar->add($title);
    $PAGE->requires->css('/blocks/myblock/styles.css');
   
    require_login($course, false);

    echo $OUTPUT->header();
    echo $OUTPUT->heading($title, 2);

    echo $OUTPUT->container_start('block_myblock');
        echo'<div>';
            echo'<form action="overview.php" method="POST">';
                echo'<select name="per1" >';       
                    echo'<option >';echo'Academic year 2020';echo'</option>';
                    echo'<option >';echo'Academic year 2019';echo'</option>';
                    echo'<option >';echo'Academic year 2018';echo'</option>';            
                echo'</select>'.' ';
                echo'<select name="per2" >';        
                    echo'<option >';echo'SCS';echo'</option>';
                    echo'<option >';echo'IS';echo'</option>';     
                echo'</select>'.' ';
                echo'<select name="per3" > ';       
                    echo'<option >';echo'1 st Year';echo'</option>';
                    echo'<option >';echo'2 nd Year';echo'</option>';
                    echo'<option >';echo'3 rd Year';echo'</option>';
                    echo'<option >';echo'4 th Year';echo'</option>';     
                echo'</select>'.' ';
                echo'<select name="per4" >';        
                    echo'<option >';echo'1 st Semester';echo'</option>';
                    echo'<option >';echo'2 nd Semester';echo'</option>';
                echo'</select>'.' ';
                echo'<select name="per5" >';
                    echo'<option >';echo'30';echo'</option>';
                    echo'<option >';echo'60';echo'</option>';
                    echo'<option >';echo'120';echo'</option>';
                    echo'<option >';echo'150';echo'</option>';       
                echo'</select>'.' ';
                echo'<select name="per6" >';
                    echo'<option >';echo'viewed';echo'</option>';
                    echo'<option >';echo'All Actions';echo'</option>';  
                echo'</select>'.' ';
                echo'<select name="logingraphid" hidden>';
                    echo'<option >';echo $id;echo'</option>';
                echo'</select>'.' ';
                echo'<select name="courseid" hidden>';
                    echo'<option >';echo $courseid ;echo'</option>'; 
                echo'</select>'.' ';
                echo'<select name="userid" hidden>';
                    echo'<option >';echo $userid;echo'</option>'; 
                echo'</select>'.' ';            

                echo'<input class="btn-primary" type="submit" value=" summary ">';
            echo'</form>';
        echo'</div>';
        echo'<div>';
            $id2=$_POST['per1'];
            $type=$_POST['per2'];
            $uyear=$_POST['per3'];
            $semester=$_POST['per4'];
            $ndays=$_POST['per5'];
            $action=$_POST['per6'];
            
            get_course_data($id2,$type,$uyear,$semester,$ndays,$action) ;
        echo '</div>';
        
    echo $OUTPUT->container_end();

    echo $OUTPUT->footer();

    