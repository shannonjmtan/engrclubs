require 'pathname'
rootdir = File.dirname(Pathname.new(__FILE__).realpath)

#
# BASIC WEBBLOCKS CONFIGURATION SETTINGS
#

# The directory into which WebBlocks is built
WebBlocks.config[:build][:dir] = "#{rootdir}/www/assets/blocks"

# The directory where all
WebBlocks.config[:src][:dir] = "#{rootdir}/src"

# Bootstrap plugins that should be included in the build
WebBlocks.config[:package][:bootstrap][:scripts] = [
    'dropdown',
    'button',
    'collapse',
    'alert'
  ];


#
# ADVANCED WEBBLOCKS CONFIGURATION SETTINGS (change at your own risk!)
#

# Location of WebBlocks core components (config.rb, definitions, core adapter)
WebBlocks.config[:src][:core][:dir] = "#{rootdir}/package/WebBlocks/src/core"

# Location of WebBlocks adapters
WebBlocks.config[:src][:adapters][:dir] = "#{rootdir}/package/WebBlocks/src/adapter"