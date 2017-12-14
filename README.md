<<<<<<< HEAD
#### Project ini dibangun menggunakan:
- Framework PHP CodeIgniter
- Database MySQL
- Frontend using jquery, requirejs

#### Konfigurasi awal yang perlu dilakukan:

File .htaccess di root folder disesuaikan dengan folder projectnya

<pre>
&lt;IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /[foldername]/index.php/$1 [L]
&lt;/IfModule>
&lt;IfModule !mod_rewrite.c>
    ErrorDocument 404 /[foldername]/index.php
&lt;/IfModule>
</pre>

File database.php di folder apps/config disesuaikan isian connection propertiesnya, ex:

<pre>
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'cms';
$db['default']['dbdriver'] = 'mysqli';
</pre>
=======
# cms
CMS
>>>>>>> 278f291e1553e6824dbc9a389e588c60dfc05743
