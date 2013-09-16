<?php

class Major_Model extends Active_Record_Model
{   
    public function __construct($key = null, $col = 'id')
    {
        parent::__construct('major', $key, $col);
    }
    
    public static function build_all()
    {
        $res = DB::mysqli()->query('SELECT * FROM major');
        if(!$res)
            return false;
        
        $arr = array();
        while($row = $res->fetch_assoc())
        {
            $obj = new Major_Model($row['id']);
            $obj->load($row);
            $arr[] = $obj;
        }
        
        return $arr;
    }
    
    public static function build_for_club($club_id = null)
    {
        if ($club_id != null)
        {
            $res = DB::mysqli()->query('SELECT * FROM major WHERE club_id = '.$club_id.' ORDER BY major_type_id ASC');
            if(!$res)
                return false;

            $arr = array();
            while($row = $res->fetch_assoc())
            {
                $obj = new Major_Model($row['id']);
                $obj->load($row);
                $arr[] = $obj;
            }

            return $arr;
        }
    }
}

?>