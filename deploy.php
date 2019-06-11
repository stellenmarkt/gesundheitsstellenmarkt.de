<?php
namespace Deployer;

require 'recipe/zend_framework.php';

// Project name
set('application', 'jobs-frankfurt.com');

// Project repository
set('repository', 'git@gitlab.cross-solution.de:cbleek/Jobs-Frankfurt.com.git');

// Shared files/dirs between deploys 
add('shared_files', [
    'test/sandbox/public/.htaccess',
    'test/sandbox/public/robots.txt',
]);

add('shared_dirs', [
    'test/sandbox/var/log',
    'test/sandbox/var/cache',
    'test/sandbox/config/autoload',
]);

// Writable dirs by web server 
add('writable_dirs', [
    'test/sandbox/var/cache',
    'test/sandbox/var/log',
]);

set('default_stage', 'prod');

// Hosts

host('upcoming.jobs-frankfurt.com')
    ->user('yawik')
    ->stage('prod')
    ->multiplexing(false) 
    ->set('deploy_path', '/var/www/production')
    ->set('writableusesudo', true);   
    
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

