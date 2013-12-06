#!/bin/bash
# init
# text colors
#alias reset='echo  "\033[0m"' # actual bash function reset does the same
#alias default='echo  "\033[37m"'
#alias blue='echo  "\033[36m"'
#alias red='echo "\033[31m"'
#alias green='echo "\033[32m"'
RED=$(tput setaf 1)
GREEN=$(tput setaf 2)
YELLOW=$(tput setaf 3)
BLACK_GROUND=$(tput setab 0);
NORMAL=$(tput sgr0)
col=50
	tput smcup
	clear

	 # default text color white
	echo "Setting up TheStudyCache..."
	echo "Writing connect file..."
	printf "*Enter hostname: "
	read hostname

	printf "*Enter mysql username: "
	read mysqlname

	printf "*Enter "$mysqlname"'s mysql password: "
	read mysqlpass
	
	DIR=$(pwd)

	echo "
	<?php 
	//Constants
	define('DB', '"$hostname"');
	define('DB_USER','"$mysqlname"');
	define('DB_PASS','"$mysqlpass"');
	define('DB_NAME','sc_main');
	?>
	" 	> $DIR/classes/includes.php

	size=$((50- 10#$(echo `expr "connect file" : '.*'`)))
echo **checking connect file	
	if [ -f $DIR/classes/includes.php ];
	then 
		printf '%s%s%*s%s\n' "connect file" "$GREEN" $size "[OK]" "$NORMAL"
	else 
		printf '%s%s%*s%s\n' "connect file" "$RED" $size "[FAIL]" "$NORMAL"
	fi
printf "\n%s\n" "**checking package list" 
declare -a PACKAGE=( mysql-server lamp-server apache2 libapache2-mod-php5 libapache2-mod-auth-mysql php5-mysql )
	tof=true
	for i in {0..4}
	do
		
		size=$((50- 10#$(echo `expr ${PACKAGE[$i]} : '.*'`)))
		THIS=$( dpkg --get-selections | grep -ci ${PACKAGE[$i]} )
		if [ "$THIS" != 0 ]
		then
			printf '%s%s%*s%s\n' ${PACKAGE[$i]} "$GREEN" $size "[OK]" "$NORMAL"
		else
			printf '%s%s%*s%s\n' ${PACKAGE[$i]} "$RED" $size "[FAIL]" "$NORMAL"
			tof=false
		fi

	done

	printf '\n%s\n' "**import 'sc_main.sql' databse"
	read -p "Continue?  (y/n) " -n 1 -r
	read p
	echo 
	if [[ $REPLY =~ ^[Yy]$ ]]
	then
		#check if sc_main exists
		if [ -f $DIR/sc_main.sql ];
		then
			echo $YELLOW
			if mysql -u $mysqlname --password=$mysqlpass  -h $hostname  < sc_main.sql 
			then
				echo $NORMAL			
				size=$((50- 10#$(echo `expr "Importing 'sc_main'" : '.*'`)))
				printf '%s%s%*s%s\n' "Importing 'sc_main'" "$GREEN" $size "[OK]" "$NORMAL"
			else
				echo $NORMAL
				size=$((50- 10#$(echo `expr "import" : '.*'`)))
				printf '%s%s%*s%s\n' "import" "$RED" $size "[FAIL]" "$NORMAL"
				tof=false
				echo "Press Enter key to continue..."
				read p 
				reset
				tput rmcup
				exit		
			fi
		else {
			size=$((50- 10#$(echo `expr  "sc_main.sql DOES NOT EXITS" : '.*'`)))
			printf '%s%s%*s%s\n' "$RED" "sc_main.sql DOES NOT EXITS" $size "[ABORTING]" "$NORMAL"
			echo "Press Enter key to continue..."
			read p 
			reset
			tput rmcup
			exit
		} fi
	fi


	if [ "$tof" = "false" ]
	then
		echo "$YELLOW**warning some errors may have occurred"
		echo "**consider installing missing packages$NORMAL"
	fi
	echo "Press Enter key to continue..."
	read p 
	reset
	tput rmcup
	












