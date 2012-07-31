<?php

/**
 * The default template for the mobile app.
 * 
 * @package template
 * @author Eric Bollens
 * @version 20120317
 * @copyright Copyright (c) 2012 UC Regents
 */

?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title><?php echo $CONFIG->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    </head>
    
    <body>
        
        <?php echo $CONTENT; ?>
        
    </body>
</html>