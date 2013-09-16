<?php

class Club_Controller extends Controller
{
    public function club($id = null)
    {
        $club_model = new Club_Model($id);
        
        $view = new View('club/club');
        
        $view->logo_path = $club_model->logo_path;
        $view->club_name = $club_model->name;
        $view->website = $club_model->website;
        $view->contact = $club_model->contact;
        $view->president = $club_model->president;
        $view->year_founded = $club_model->year_founded;
        $view->about = $club_model->about;
        $view->how_to_join = $club_model->how_to_join;
        $view->upcoming_events = $club_model->upcoming_events;
        
        $type_model = new Type_Model($club_model->id);
        $club_type_model = new Club_Type_Model($type_model->club_type_id);
        $type = $club_type_model->name;
        $view->type = $type;
        
        $major_model = new Major_Model($club_model->id);
        $major_type_model = new Major_Type_Model(intval($major_model->major_type_id));
        $major = $major_type_model->major;
        $view->major = $major;

        echo $view->render();   
    }
    
    public function create($done = false)
    {
        if(!$done)
        {
            $view = new View('club/create');
            $view->action = URL::mvc('club', 'create', array(true));
            echo $view->render();
        }
        else 
        {
            var_dump($_POST['name']);
            /*$club_model = new Club_Model();
            $club_model->name = "awefawef";
            $club_model->create();*/
            
            $view = new View('club/success');
            echo $view->render();
        }
    }
    
    public function club_list()
    {
        
        $view = new View('club/club_list');
        $club_models = Club_Model::build_all();
        $types = array();
        $majors = array();
        $links = array();
        
        foreach($club_models as $club_model)
        {
            $links[$club_model->id] = URL::mvc('club', 'club', array($club_model->id));
            $type_models = Type_Model::build_for_club(intval($club_model->id));
            $major_models = Major_Model::build_for_club(intval($club_model->id));
            
            foreach($type_models as $type_model)
            {  
                $club_type_model = new Club_Type_Model(intval($type_model->club_type_id));
                $types[$club_model->id][] = $club_type_model->name;
            } 
            
            foreach($major_models as $major_model)
            {
                $major_type_model = new Major_Type_Model(intval($major_model->major_type_id));
                $majors[$club_model->id][] = $major_type_model->major;
            }
            
        }
        
        $view->club_models = $club_models;
        $view->types = $types;
        $view->majors = $majors;
        $view->links = $links;
        
        echo $view->render();
    }
}

?>