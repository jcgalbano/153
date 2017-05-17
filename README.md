# CS 153 Project
Admin panel project for CS 153 course under isr Phillip Zuniga

# Installation:

1. Install XAMPP/WAMPP.
2. Place all files into "ci" folder (or just change the base URL in the config for the folder name cause by default it's localhost:80/ci).
3. Use XAMPP's native MariaDB to create a database db_153 and import the ion_auth.sql included in the folder.

# Notes about the database:

You can basically change all settings in the config.php but by default I set the db_user to root and password to none, and set the db name to db_153. I think we should probably change this as I've read somewhere that having root in the config file is a weakness vector.

Don't use the ion_auth.sql provided by your ion_auth download. Just use this one as I have changed the model to have birthday and address.

4. Run the mysql and apache server from the XAMPP/WAMP control panel
5. Once it's running go to locahost/ci/ to access codeigniter or go to localhost:ci/admin/ to access the admin page and login. You can improve this by routing ci to the actual admin page but routing will take a while.
6. Acess the website as an admin by simply using username: administrator password: password cause instead of using the email by default I set the identity in the config file to be the username instead to follow Sir Z's format.

# Notes about some security measures:

Basically I created a .htaccess file to remove the index.php in the url so it to acess certain controllers just use the the typical way to access them localhost:ci/admin/

Used a .htaccess file to block anyone from accessing the projects assets by just typing in the path of the file in the browser

We can add session cookies to our website to make it more secure for csrf attacks but don't really know how to start on that
