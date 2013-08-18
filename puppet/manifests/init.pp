exec { "apt-update":
    command => "/usr/bin/apt-get update",
}

$dependencies = [
    "php5",
    "php5-cli",
    "php5-curl",
    "php5-sqlite",
    "php5-intl",
    "php5-mcrypt",
]

package { $dependencies:
    ensure  => present,
    require => Exec['apt-update'],
}

class { 'apache':
    mpm_module => 'prefork',
    require    => Exec['apt-update'],
}
class { "apache::mod::rewrite": }
class { "apache::mod::php": }
apache::vhost { 'hackbrew.local':
    docroot    => '/vagrant/web',
    servername => "hackbrew.local",
    port       => 80,
    ensure     => present,
    override   => ["All"],
    options    => ["FollowSymlinks MultiViews"],
}

class { 'mysql':
    require => Exec['apt-update'],
}
class { 'mysql::php': }
class { 'mysql::server':
    config_hash => { 'root_password' => 'root' }
}
mysql::db { 'hackbrew':
    user     => 'root',
    password => 'root',
    host     => 'localhost',
}
