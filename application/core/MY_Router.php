<?php
class MY_Router extends CI_Router {
    protected function _set_default_controller() {

        if (empty($this->default_controller)) {

            show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
        }
        if (sscanf($this->default_controller, '%[^/]/%s', $class, $method) !== 2) {
            $method = 'index';
        }
        if( is_dir(APPPATH.'controllers/'.$class) ) {
            $this->set_directory($class);
            $class = $method;
            if (sscanf($method, '%[^/]/%s', $class, $method) !== 2) {
                $method = 'index';
            }
        }

        if ( ! file_exists(APPPATH.'controllers/'.$this->directory.ucfirst($class).'.php')) {
            return;
        }
        $this->set_class($class);
        $this->set_method($method);
        $this->uri->rsegments = array(
            1 => $class,
            2 => $method
        );
        log_message('debug', 'No URI present. Default controller set.');
    }
}