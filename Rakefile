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
include Rake::DSL

# Definitions

class WebBlocks
  
  attr_accessor :path
    
  def initialize(path)
    @path = path
  end
  
  def rake(command = '')
    pwd = Dir.pwd
    Dir.chdir @path
    sh "rake #{command} -- --config=../../Rakefile-config.rb"
    Dir.chdir pwd
  end
  
end

blocks = WebBlocks.new('package/WebBlocks')

# Tasks

task :default => [:init] do
  blocks.rake
end

task :build => [:init] do
  blocks.rake 'build'
end

task :build_all => [:init] do
  blocks.rake 'build_all'
end

task :clean => [:init] do
  blocks.rake 'clean'
end

task :clean_all => [:init] do
  blocks.rake 'clean_all'
end

task :check => [:init] do
  blocks.rake 'check'
end

task :init do
  sh "git submodule init"
  sh "git submodule update"
  blocks.rake 'init'
end

task :reset => [:clean_all] do
  blocks.rake 'reset'
end

task :environment do
  blocks.rake 'environment'
end

task :paths do
  blocks.rake 'paths'
end

task :includes do
  blocks.rake 'includes'
end

task :packages do
  blocks.rake 'packages'
end
