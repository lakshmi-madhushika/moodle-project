<?php

   require_once(dirname(__FILE__) . '/../../config.php');
   require_once($CFG->dirroot.'/blocks/myblock/lib.php');

   define('USER_SMALL_CLASS', 20);   
   define('USER_LARGE_CLASS', 200);  
   define('DEFAULT_PAGE_SIZE', 20);
   define('SHOW_ALL_PAGE_SIZE', 5000);

   $id       = required_param('year', PARAM_TEXT);
   $type = required_param('type', PARAM_TEXT);
   $uyear   = required_param('uyear',PARAM_TEXT);
   $semester=required_param('semester',PARAM_TEXT);
   $page     = optional_param('page', 0, PARAM_INT); 
   $perpage  = optional_param('perpage', DEFAULT_PAGE_SIZE, PARAM_INT); 
   $group    = optional_param('group', 0, PARAM_INT); 

   $PAGE->set_url(
      '/blocks/myblock/graph.php',
      array(
         'page' => $page,
         'perpage' => $perpage,
         'group' => $group,
      )
   );

   $title = 'Overview of students';
   $PAGE->set_title($title);
   $PAGE->set_heading($title);
   $PAGE->navbar->add($title);

   echo $OUTPUT->header();
   echo $OUTPUT->heading($title, 2);

   echo $OUTPUT->container_start('block_myblock');
      echo'<div>';
         get_course_data($id,$type,$uyear,$semester) ;
      echo '</div>';
   echo $OUTPUT->container_end();

   echo $OUTPUT->footer();
