hackbrew
========

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
    git submodule update --init --recursive
    

You might have to mess around with the cache directory by manually making the folders and giving them 777 permissions

If using vagrant, make sure to add

    127.0.0.1 hackbrew.local

to your hosts file. Now just open up your browser to http://hackbrew.local:8080
