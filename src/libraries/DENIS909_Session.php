<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DENIS909_Session extends CI_Session
{
    function add_flashdata(string $key, $value)
    {
        $flashdata = $this->flashdata($key);

        if (!$flashdata)
        {
            $this->set_flashdata($key, $value);

            return;
        }

        $flashdata = (array) $flashdata;

        foreach((array) $value as $v)
        {
            $flashdata[] = $v;
        }

        $this->set_flashdata($key, $flashdata);
    }
}