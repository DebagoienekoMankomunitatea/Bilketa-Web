#!/bin/bash
BASEDIR=$(dirname $0)
/usr/bin/php ${BASEDIR}/cli.php -a default/worker/encoder -e development 
