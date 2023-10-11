<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'laravel-passport');

// Project repository
set('repository', 'https://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@github.com/naokoike0204/laravel-passport.git');


// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', ['.env']);
set('shared_dirs', ['storage']);

// Writable dirs by web server
set('writable_dirs', ['bootstrap/cache', 'storage']);

// Clear paths by web server
set('clear_paths', []);

// Hosts

host('laravel.test2')
   // ->stage('production')
    //->user('ec2-user')
    ->set('branch', 'main')
    ->set('deploy_path', '/var/www/{{application}}');

// Testing Server
// githubの認証をスキップするためgitプロトコルでリポジトリを指定している
// host('localhost')
//     ->stage('development')
//     ->user('ike')
//     ->set('branch', 'master')
//     ->set('deploy_path', '~/{{application}}')
//     ->set('repository', 'git@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@github.com/naokoike0204/laravel-passport.git')
//     ->set('writable_mode', 'chmod');

// Laravel
task('build', function () {
    run('cd {{release_path}} && build');
});

desc('Upload dotenv file');
task('deploy:dotenv', function () {
    $src = __DIR__ . '/.env.{{target}}';
    $dst = '{{deploy_path}}/shared/.env';
    $hostname = '{{hostname}}';
    upload($src, $dst);
    writeln("uploaded {$src} to {$hostname}:{$dst}");
});

// リリースディレクトリのパーミッション調整
//　（clone時にパーミッションが ec2-user:ec2-user となるため）
task('release-permission', function () {
    desc('[release-permission] task starting...');
    run('sudo chown -R apache. {{release_path}}');
    desc('[release-permission] task has been completed.');
});


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

