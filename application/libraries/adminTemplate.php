<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminTemplate {
	    var $template_data = array();

		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();
            if(!empty($this->template_data)){
                $view_data = array_merge($this->template_data,$view_data);
            }
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data, $return);
		}

        function getMenu($parent, $level, $menuid,$title)
        {
            $menu = new MyMenu;
            $data['menu'] = $menu->buildMenu($parent, $level, $menuid);
            $this->set($title, $data['menu']);
        }
}

?>
