sand.cise.ufl.edu
storm.cise.ufl.edu


0. Download the files from GitHub and edit config.php with your Oracle username and password
1. Connect to the CISE server using sand and not storm
2. mkdir public_html
3. chmod 755 public_html
4. Use an FTP client to upload all the files and put them into public_html, using sand and not storm
5. cd ./public_html
6. chmod -R 711 *.php
7. chmod 644 config.php
8. chmod 644 htaccess
9. Disconnect and reconnect, but this time to storm and not sand
10. cd ./public/sql
11. chmod -R 711 *
12. Now without changing folders, run the following commands from the command line one by one


source /usr/local/etc/ora11.csh
sqlldr username/password@orcl control=1-doctors.ctl
sqlldr username/password@orcl control=2-users.ctl
sqlldr username/password@orcl control=3-appointments.ctl
sqlldr username/password@orcl control=4-insurance.ctl
sqlldr username/password@orcl control=5-prescriptions.ctl