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
        
        $type_models = Type_Model::build_for_club(intval($club_model->id));
        $major_models = Major_Model::build_for_club(intval($club_model->id));

        foreach($type_models as $type_model)
        {  
            $club_type_model = new Club_Type_Model(intval($type_model->club_type_id));
            $types[] = $club_type_model->name;
        } 

        foreach($major_models as $major_model)
        {
            $major_type_model = new Major_Type_Model(intval($major_model->major_type_id));
            $majors[] = $major_type_model->major;
        }
        
        $view->types = $types;
        $view->majors = $majors;

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
            /*$club_model = new Club_Model();
            $club_model->name = "American Indian Science and Engineering Society";
            //$club_model->logo_path = "";
            $club_model->website = "https://sites.google.com/site/uclaaises/home";
            $club_model->contact = "ucla.aises@gmail.com";
            $club_model->president = "Omar Leyva";
            $club_model->year_founded = "1990";
            
            $club_model->about = "
            Entering its nineteenth year on campus, AISES strives to encourage American Indians to pursue careers as scientists and engineers while preserving their cultural heritage. The goal of AISES is to substantially increase the representation of American Indians and Alaskan Natives in engineering, science, and other related technology disciplines. AISES devotes most of its energy to its outreach event where members put on engineering workshops for students from local middle schools, other wise known as Youth Motivation Day. In addition, AISES also conducts tutoring at local schools to help students succeed in math. Serving as mentors and role models for younger students enables UCLA AISES students to further develop professionalism and responsibility while maintaining a high level of academic excellence and increasing cultural awareness.";
            
            $club_model->how_to_join = "Come to our meetings every other Tuesday. Email us or visit our website to find out when the first meeting is.";
            
            $club_model->upcoming_events = "<ul>
            <li>Biweekly Meetings</li>
            <li>Weekly Tutoring Sessions</li>
            <li>Youth Motivation Day</li>
            <li>Frybread Fundraisers</li>
            </ul>
            ";
            
            $club_model->create();
            
            $types = array(4);
            
            foreach($types as $type)
            {
                $type_model = new Type_Model();
                $type_model->club_id = $club_model->id;
                $type_model->club_type_id = $type;
                $type_model->create();
            }
            
            $majors = array(1);
            
            foreach($majors as $major)
            {
                $major_model = new Major_Model();
                $major_model->club_id = $club_model->id;
                $major_model->major_type_id = $major;
                $major_model->create();
            }*/
            
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
        
        $club_types = Club_Type_Model::build_all();
        $major_types = Major_Type_Model::build_all();
        
        $view->club_models = $club_models;
        $view->types = $types;
        $view->majors = $majors;
        $view->links = $links;
        $view->club_types = $club_types;
        $view->major_types = $major_types;
        
        echo $view->render();
    }
}

?>
