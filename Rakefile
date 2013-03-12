# Setup

require 'rubygems'
require 'bundler'
begin
  Bundler.setup(:default, :development)
rescue Bundler::BundlerError => e
  $stderr.puts e.message
  $stderr.puts "Run `bundle install` to install missing gems"
  exit e.status_code
end
require 'rake'

# Definitions

include Rake::DSL

class WebBlocks

  attr_accessor :path

  def initialize(path, args)
    @path = path
    @args = args
  end

  def rake(command = '')
    Dir.chdir @path do
        sh "rake #{command} -- --config=../../Rakefile-config.rb #{@args}"
    end
  end

end

args = ''
ARGV.each do |arg|
  next if arg[0,1] != '-' and args == ''
  args += " #{arg}"
end

blocks = WebBlocks.new('package/WebBlocks', args)

# Tasks

task :default => [:_init] do
  blocks.rake
end

task :_init do
  IO.popen("git rev-parse --show-toplevel") do |io|
    Dir.chdir(io.gets.strip) do
      sh "git submodule init"
      sh "git submodule update"
    end
  end
  Dir.chdir('package/WebBlocks') do
    sh "bundle"
    sh "npm install"
  end
end

task :init => [:_init] do
  blocks.rake 'init'
end

task :build => [:_init] do
  blocks.rake 'build'
end

task :build_all => [:_init] do
  blocks.rake 'build_all'
end

task :build_css => [:_init] do
  blocks.rake 'build_css'
end

task :build_img => [:_init] do
  blocks.rake 'build_img'
end

task :build_js => [:_init] do
  blocks.rake 'build_js'
end

task :clean => [:_init] do
  blocks.rake 'clean'
end

task :clean_packages => [:_init] do
  blocks.rake 'clean_packages'
end

task :clean_all => [:_init] do
  blocks.rake 'clean_all'
end

task :reset_packages => [:_init] do
  blocks.rake 'reset_packages'
end

task :reset => [:_init] do
  blocks.rake 'reset'
end