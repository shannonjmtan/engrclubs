<style type="text/css">
    form {
        padding-left: 5%;
    }
    
    input {
        width: 50%;
    }
    
    textarea {
        width: 50%;
    }
    
    fieldset {
        padding-bottom: 3%;
    }
    
</style>

<?php var_dump($_POST); ?>

<form action="<?php echo $action; ?>" method="post">
    <fieldset>
        <label for="name">Club Name</label>
        <input type="text" id="name">
        <label for="website">Website</label>
        <input type="text" id="website">
        <label for="president">President</label>
        <input type="text" id="president">
        <label for="contact">Contact</label>
        <input type="text" id="contact">
        <label for="year_founded">Year Founded</label>
        <input type="text" id="year_founded">
        <label for="logo_path">Logo Path</label>
        <input type="text" id="logo_path">
        <label for="about">About</label>
        <textarea rows="10" id="about"></textarea>
        <label for="how_to_join">How To Join</label>
        <textarea rows="10" id="how_to_join"></textarea>
        <label for="upcoming_events">Upcoming Events</label>
        <textarea rows="10" id="upcoming_events"></textarea>
        <button type="submit" class="btn">Submit</button>
    </fieldset>
</form>
