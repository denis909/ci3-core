<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DENIS909_Form_validation extends CI_Form_validation
{
    /**
     * Is Unique
     *
     * Check if the input value doesn't already exist
     * in the specified database field.
     *
     * @param string $str
     * @param string $field
     * @return bool
     */
    public function is_unique($str, $field)
    {
        $res = sscanf($field, '%[^.,].%[^.,],%[^.,],%[^.,]', $table, $f, $pk, $id);
        
        if ($res == 4)
        {
            $where = [$f => $str, $pk . ' !=' => $id];

            return isset($this->CI->db)
                ? ($this->CI->db->limit(1)->get_where($table, $where)->num_rows() === 0)
                : FALSE;
        }

        return parent::is_unique($str, $field);
    }
}