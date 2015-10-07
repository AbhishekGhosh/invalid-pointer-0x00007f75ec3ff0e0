# invalid pointer: 0x00007f75ec3ff0e0

```` root@4gbtcw:/home/ubuntu# php -v
PHP Warning:  Module 'Zend OPcache' already loaded in Unknown on line 0
PHP Warning:  Zend OPcache: module registration failed! in Unknown on line 0
PHP 5.5.9-1ubuntu4.13 (cli) (built: Sep 29 2015 15:24:49)
Copyright (c) 1997-2014 The PHP Group
Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies
    with Zend OPcache v7.0.3, Copyright (c) 1999-2014, by Zend Technologies
*** Error in `php': free(): invalid pointer: 0x00007fb2943ff0e0 ***
Aborted (core dumped) ````

Reproduction :

apt-get install php5-common php5-curl php5-gd php5-cli php5-fpm php5-dev php-apc php5-xcache php-apcu php5-xcache


