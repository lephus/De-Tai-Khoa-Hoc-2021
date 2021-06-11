#!/bin/bash
result=$(java -classpath $1 tcp_client $2 $3 $4 $5)
echo $result

