<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DENIS909_Loader extends CI_Loader
{
	public function view($view, $vars = array(), $return = false)
    {
        $return = parent::view($view, $vars, $return);

        $this->clear_vars();

        return $return;
    }
}