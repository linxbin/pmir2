#/usr/bin/
kill -9 $(netstat -nlp | grep :7000 | awk '{print $7}' | awk -F"/" '{ print $1 }');
php script Server/start