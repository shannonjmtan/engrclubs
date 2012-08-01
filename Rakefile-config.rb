require 'pathname'

rootdir = File.dirname(Pathname.new(__FILE__).realpath)

# TODO: should be www/assets instead of www/blocks but can't be until custom JS,
# images and HTML are supported or otherwise this ends up overwriting other 
# assets that the developer places within www/assets
WebBlocks.config[:build][:dir] = "#{rootdir}/www/assets/blocks"

WebBlocks.config[:src][:sass] = "#{rootdir}/src/sass"