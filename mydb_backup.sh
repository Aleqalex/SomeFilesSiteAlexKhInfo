#!/bin/sh
my_user='adm_mydb_backup'
my_pwd='k3kmfo5s'

db='mydb'

date_today=$(date +%y-%m-%d)

backup_dir='/var/mydb_backups/'

dump_file=$db-$date_today'.sql'

/usr/bin/mysqldump --user=$my_user --password=$my_pwd --lock-tables \
--database $db > $backup_dir$dump_file

cp $backup_dir$dump_file /media/alex/ALEXKHRES/mydb_backups
exit
