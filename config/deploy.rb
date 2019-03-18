set :application, ENV['APPLICATION']
set :repo_url, ENV['REPO_URL']
set :deploy_to, ENV['DEPLOY_TO']
set :keep_releases, ENV['KEEP_RELEASES'].to_i

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default value for :pty is false
# set :pty, true

# Default value for default_env is {}
set :default_env, { path: "/usr/local/bin:$PATH" }

# Default value for local_user is ENV['USER']
# set :local_user, -> { `git config user.name`.chomp }

# set :use_sudo, true
# set :sudo, "sudo -u root -i"

### Shared files for Rails
# append :linked_files, '.env'
# append :linked_dirs, 'log', 'tmp', 'public/system', 'public/assets', 'public/.well-known/acme-challenge'

### Shared files for Yii
append :linked_files, '.env'
append :linked_dirs, 'storage', 'vendor', 'bootstrap/cache', 'node_modules'

### Custom your deploy flow
namespace :deploy do

# task :confirmation do
#   puts <<-WARN
#   ===========================================================
#   提醒：大俠，您現在要部署的是正式機，請確認一下喲 ~
#   ===========================================================
#   WARN
#   ask :value, "確定部署請輸入大寫 Y"

#   if fetch(:value) != 'Y'
#     puts "\n取消部署。"
#     exit
#   end
# end

  ### Reset releases directory's owner as deploy user
  before 'deploy:cleanup', 'misc:reset_permission'

  ### Custom tasks before / after published
  # before 'deploy:published', 'custom:pre_setup'
  # after 'deploy:finished', 'custom:post_setup'

  ### Docker flow
  after 'deploy:published', 'docker:build'
  after 'docker:build', 'docker:compose'

end

Capistrano::DSL.stages.each do |stage|
  after stage, 'deploy:confirmation' if stage == 'production'
end
