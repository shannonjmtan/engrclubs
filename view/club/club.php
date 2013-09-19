<style type="text/css">
   body {
        padding-top: 60px;
    }
    
    .logo {
        max-height: 90%;
        max-width: 90%;
        width: auto;
        height: auto;
        padding-bottom: 50px;
        min-height: 225px;
        min-width: 225px;
    }
    
    .title {
        text-align: center;
    }
    
    .section {
        padding-left: 2px;
        padding-bottom: 5px;
        font-size: .9em;
    }
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <?php if (strlen($logo_path) > 0) { ?>
            <img class="logo" src="<?php echo $logo_path; ?>" class="img-rounded">
            <?php } ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Club Name</th>
                        <th><?php echo $club_name; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (strlen($website) > 0) {?>
                    <tr>
                        <td>Website</td>
                        <td><a href="<?php echo $website; ?>"><?php echo $website; ?></a></td>
                    </tr>
                    <?php } ?>
                    <?php if (strlen($contact) > 0) {?>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $contact; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if (strlen($president) > 0) {?>
                    <tr>
                        <td>President</td>
                        <td><?php echo $president; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if (strlen($year_founded) > 0) {?>
                    <tr>
                        <td>Founded</td>
                        <td><?php echo $year_founded; ?></td>
                    </tr>
                    <?php } 
                    
                    if (sizeof($types) > 0)
                    { ?>
                    
                        <tr>
                            <td>Type</td>
                            <td>
                               
                        <?php 
                        foreach($types as $type) { ?>
                            <?php echo $type; ?><br>
                        
                        <?php } ?>
                        </td>
                        </tr>
                        
                    <?php  
                     } 
                    
                    if (sizeof($majors) > 0)
                    { ?>
                    
                        <tr>
                            <td>Majors</td>
                            <td>
                               
                        <?php 
                        foreach($majors as $major) { ?>
                            <?php echo $major; ?><br>
                        
                        <?php } ?>
                        </td>
                        </tr>
                        
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="span9">
            <div class="section">
                <h2 class="title">About <?php echo $club_name; ?></h2>
                <hr>
                <?php echo $about; ?>
            </div>
            <?php if (strlen($how_to_join) > 0) {?>
            <div class="section">
                <h3 class="title">How To Join</h3>
                <hr>
                <?php echo $how_to_join; ?>
            </div>
            <?php } ?>
            <?php if (strlen($upcoming_events) > 0) {?>
            <div class="section">
                <h3 class="title">Notable Fall Quarter Events</h3>
                <hr>
                <?php echo $upcoming_events; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>