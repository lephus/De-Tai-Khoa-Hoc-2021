#!/bin/bash
result=$(java -classpath $1 tcp_client $2)
echo $result

