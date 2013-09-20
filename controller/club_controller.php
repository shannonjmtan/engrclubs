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
    
/*    public function create($done = false)
    {
        
        if(!$done)
        {
            $view = new View('club/create');
            $view->action = URL::mvc('club', 'create', array(true));
            echo $view->render();
        }
        else 
        {
            $club_model = new Club_Model();
            $club_model->name = "American Institute of Aeronautics and Astronautics (AIAA)";
            $club_model->logo_path = "assets/img/aiaa.jpeg";
            $club_model->website = "http://aiaa.seas.ucla.edu/";
            $club_model->contact = "aiaaucla@gmail.com";
            $club_model->president = "Aurora Garcia";
            //$club_model->year_founded = "1946";
            
            $club_model->about = "
            <p>The American Institute of Aeronautics and Astronautics (AIAA) is a professional aerospace engineering organization. With more than 31,000 members worldwide, AIAA links professionals, educators, and students together to advance the aerospace industry. The UCLA Chapter in particular focuses on enriching hands-on experiences for student engineers, building bridges between students and industry professionals, and expanding this community of one-of-a-kind professions.</p>
            <p>AIAA's UCLA Student Chapter offers exciting projects and events for anyone interested in the aerospace industry. The Rocket Project at UCLA, Design/Build/Fly (DBF), and Unmanned Air Vehicle (UAV) are all AIAA engineering projects active throughout the year. Each project is entirely student run, and welcomes passionate engineers who love to learn and grow with dedicated and ambitious teammates. AIAA also holds fun professional networking events! In the past, we've hosted successful events such as ATK Company Tour, Lockheed Martin Game night, MAE Alumni Networking Night, and numerous company information nights. We also have social events bringing students to the Miramar Air show, kayaking, BBQs, and trips to the California Science Center. Students do no need to be aerospace engineering majors to join AIAA, and in fact we welcome students from all majors.</p>";     
            
            $club_model->how_to_join = "For more information about becoming a part of the AIAA UCLA Chapter, please visit our website and attend the AIAA Kick-off Meeting.
";
            
            $club_model->upcoming_events = "<ul>
            <li>AIAA Kick-off Meeting</li>
            <li>Project Kick-off Meetings</li>
            <li>Internship Insider Night</li>
            </ul>
            ";
            
            $club_model->create();
            
            $types = array(2, 3);
            
            foreach($types as $type)
            {
                $type_model = new Type_Model();
                $type_model->club_id = $club_model->id;
                $type_model->club_type_id = $type;
                $type_model->create();
            }
            
            $majors = array(2);
            
            foreach($majors as $major)
            {
                $major_model = new Major_Model();
                $major_model->club_id = $club_model->id;
                $major_model->major_type_id = $major;
                $major_model->create();
            }
            
            var_dump($_POST);
            $view = new View('club/success');
            echo $view->render();
        
    }*/
    
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
