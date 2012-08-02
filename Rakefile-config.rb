# Determine absolute pathing for use in the build settings

require 'pathname'
rootdir = File.dirname(Pathname.new(__FILE__).realpath)



# The directory where WebBlocks is built
#
# TODO: should be www/assets instead of www/blocks but can't be until custom JS,
# images and HTML are supported or otherwise this ends up overwriting other 
# assets that the developer places within www/assets

WebBlocks.config[:build][:dir] = "#{rootdir}/www/assets/blocks"



# The directory where the SASS files site.scss and site-ie.scss are pulled from
# for a WebBlocks build

WebBlocks.config[:src][:sass] = "#{rootdir}/src/sass"



# The Bootstrap plugins that should be packaged in the WebBlocks build

WebBlocks.config[:package][:bootstrap][:scripts] = [
    'dropdown',
    'button',
    'collapse',
    'alert'
  ];