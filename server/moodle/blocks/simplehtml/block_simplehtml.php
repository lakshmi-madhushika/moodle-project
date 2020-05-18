<?php
class block_simplehtml extends block_base {
    public function init() {
        $this->title = get_string('simplehtml', 'block_simplehtml');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    public function get_content() {
        if ($this->content !== null) {
          return $this->content;
        }
     
        $this->content         =  new stdClass;
        $this->content->text   = 'The content of our SimpleHTML block!';
        $this->content->footer = 'Footer here...';
     
        return $this->content;
    }

    public  function has_config() {return true;}

    public function instance_allow_multiple() {
        return true;
      }

      public function instance_allow_config() {
        return true;
      }
    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('defaulttitle', 'block_simplehtml');            
            } else {
                $this->title = $this->config->title;
            }
     
            if (empty($this->config->text)) {
                $this->config->text = get_string('defaulttext', 'block_simplehtml');
            }    
        }
    }
    
    public function instance_config_print() {
        return true;
      }

   public function applicable_formats(){
    return array(
        'site-index' => true,
       'course-view' => true, 
'course-view-social' => false,
               'mod' => true, 
          'mod-quiz' => false
);
   }
   
   public function after_install(){

   }
   public function before_delete(){

   }

   public function hide_header() {
    return false;
  }
}