#/usr/bin/
kill -9 $(netstat -nlp | grep :7000 | awk '{print $7}' | awk -F"/" '{ print $1 }');
ps aux | grep Server/start | awk '{print $2}' | xargs kill -9;
