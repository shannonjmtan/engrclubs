<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>

<style type="text/css">
    .span2 {
        padding-top: 20px;
    }
    
    .success {
        background: #FFB300;
    }
    
    thead {
        background: #0073CF;
        color: white;
    }
    
    .nav-header {
        font-size: 1.3em;
    }
    
    
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Filter by Major</li>
                    
                    <?php
                    foreach($major_types as $major_type)
                    {
                        echo '<li><a id="'.$major_type->major.'" href="#">'.$major_type->major.'</a></li>';
                    }
                    ?>
                    
                    <li class="nav-header">Filter by Type</li>
                    
                    <?php
                    foreach($club_types as $club_type)
                    {
                        echo '<li><a id="'.$club_type->name.'" href="#">'.$club_type->name.'</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="span9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Club Name</th>
                        <th>Majors</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    
                    foreach($club_models as $club_model)
                    {
                        echo '<tr>';
                        echo '<th>';
                        
                        if(isset($links[$club_model->id]))
                            echo '<a href="'.$links[$club_model->id].'">'.$club_model->name.'</a>';
                        else
                            echo $club_model->name;
                                
                        echo'</th>';
                        
                        echo '<th>';
                        foreach($majors[$club_model->id] as $major)
                        {
                            echo $major;
                            echo '<br>';
                        }
                        echo '</th>';
                        
                        
                        echo '<th>';
                        
                        foreach($types[$club_model->id] as $type)
                        {
                            echo $type;
                            echo '<br>';
                        }
                        
                        echo '</th>';
                        
                        
                        echo '</tr>';
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

var searchtext = "";
var search;
    
$(".nav-list > li > a").click(function(event){
    event.preventDefault();
    var id = $(this).attr("id");
    var parent = $(this).parent();
    if (!parent.hasClass("active"))
    {
        searchtext += ":contains('"+id+"')";
        $(this).parent().addClass("active");
    }
    else
    {
        $(this).parent().removeClass("active");
        var re = new RegExp(":contains\\(\\'"+id+"\\'\\)");
        searchtext = searchtext.replace(re, "");
    }
    
    $(".success").removeClass("success");
    if (searchtext != "")
        $("tr"+searchtext).addClass("success");
});

   
</script>
