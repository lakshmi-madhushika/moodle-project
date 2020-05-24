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
        echo '<div>';
            echo' <ul class="dropdown">';       
                echo'<li >';echo'<button  class="dropbtn btn btn-secondary dropdown-toggle" data-toggle="dropdown">';echo'Academic Year 2020';echo'</button>';
                    echo' <ul class="dropdown-content">';           
                        echo' <li>';echo'<label class="dropdown-toggle" data-toggle="dropdown">';echo'SCS';echo'</label>';
                            echo' <ul>';
                                echo'<li >';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'1 st Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=1 st Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=1 st Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo'</ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'2 nd Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=2 nd Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=2 nd Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'3 rd Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=3 rd Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=3 rd Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'4 th Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=4 th Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=SCS && uyear=4 th Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                            echo'</ul>';
                        echo'</li>';
                        echo' <li>';echo'<label class="dropdown-toggle"  data-toggle="dropdown">';echo'IS';echo'</label>';
                            echo' <ul>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'1 st Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=1 st Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=1 st Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'2 nd Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=2 nd Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=2 nd Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'3 rd Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=3 rd Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=3 rd Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                                echo'<li>';echo'<a class="dropdown-toggle" data-toggle="dropdown">';echo'4 th Year';echo'</a>';
                                    echo' <ul>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=4 th Year && semester=1 st Semester">';echo'1 st Semester';echo'</a>';echo'</li>';
                                        echo'<li>';echo'<a href="/blocks/myblock/graph.php?year=Academic Year 2020 && type=IS && uyear=4 th Year && semester=2 nd Semester">';echo'2 nd Semester';echo'</a>';echo'</li>';
                                    echo' </ul>';
                                echo'</li>';
                            echo'</ul>';
                        echo'</li>';
                    echo'</ul>';
                echo'</li>';       
            echo'</ul>';
        echo '</div>';        
    echo $OUTPUT->container_end();

    echo $OUTPUT->footer();
