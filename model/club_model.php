<?php

class Club_Model extends Active_Record_Model
{   
    public function __construct($key = null, $col = 'id')
    {
        parent::__construct('clubs', $key, $col);
    }
    
    public static function build_all($limit = 0, $offset = 0)
    {
        $res = DB::mysqli()->query('SELECT * FROM clubs ORDER BY `name` ASC');
        if(!$res)
            return false;
        
        $arr = array();
        while($row = $res->fetch_assoc())
        {
            $obj = new Club_Model($row['id']);
            $obj->load($row);
            $arr[] = $obj;
        }
        
        return $arr;
    }
}

?>