<style type="text/css">
    .logo {
        max-width: 90%;
        width: auto;
        height: auto;
        padding-bottom: 50px;
        min-width: 60%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        
    }
    
    .title {
        text-align: center;
    }
    
    .section {
        padding-bottom: 5px;
        font-size: 1.2em;
    }
    
    .website {
        word-break: break-all;
    }
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span5">
            <div class="row-fluid">
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
                            <td class="website"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></td>
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
        </div>
        <div class="span7">
            <div class="row-fluid">
                <div class="span12">
                    <div class="section">
                        <h2 class="title">About 
                            <?php 
                            
                            if (strlen($club_name) > 20)
                                echo substr($club_name, 0 , 20).'...';
                            else
                                echo $club_name;
                            ?>
                        </h2>
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
    </div>
</div>