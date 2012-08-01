require 'pathname'

rootdir = File.dirname(Pathname.new(__FILE__).realpath)

WebBlocks.config[:build][:dir] = "#{rootdir}/www/assets"