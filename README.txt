1.Start xampp and click "start" for both "Apache" and "MySQL".

2.Open browser and type : http://localhost/phpmyadmin/  here, in this portal create a new database by click the "new" button on the left side. Name it as "dbmsproject"

2.Now, Copy the file "data.sql" included among the project files into a drive.(Do not copy it into any sub-folders, just copy it directly into a drive)

3.Find out the name of the drive in which XAMPP has been installed.

4.Copy this entire folder containing project files as it is and not just the files to the location X:\xampp\phpMyAdmin\
  NOTE:Here "X" is the drive name in which XAMPP has been installed.
       For example, if your folder name containing all the project files including this README file is "ankiProjectDBMS" then final location of this folder after copy should be X:\xampp\phpMyAdmin\ankiProjectDBMS

5.Then type the following command in command prompt:
  X:/xampp/mysql/bin/mysql – u root -p dbmsproject < Y:/test.sql (sql file name)
  NOTE: Here "X" is the drive name in which XAMPP has been installed and "Y" is the drive name in which "data.sql" file was copied to.
        Try to copy the data.sql file into the same drive as "X".

6.Then go to browser and type :   http://localhost/phpmyadmin/ankiProjectDBMS/index.php