<?php

/**
 * The default template for the mobile app.
 * 
 * @package template
 * @author Eric Bollens
 * @version 20120801
 * @copyright Copyright (c) 2012 UC Regents
 */

?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title><?php echo $CONFIG->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="<?php echo URL::blocks('css/blocks.css'); ?>">
        <script src="<?php echo URL::blocks('js/blocks.js'); ?>"></script>
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo URL::blocks('css/blocks-ie.css'); ?>">
        <script src="<?php echo URL::blocks('js/blocks-ie.js'); ?>"></script>
        <![endif]-->
    </head>
    
    <body>
        
        <?php echo $CONTENT; ?>
        
    </body>
</html>