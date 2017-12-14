#### Project ini dibangun menggunakan:
- Framework PHP CodeIgniter
- Database Microsoft SQL Server
- Frontend using jquery, requirejs

#### Konfigurasi awal yang perlu dilakukan:

File .htaccess di root folder disesuaikan dengan folder projectnya

<pre>
&lt;IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /shpedng/index.php/$1 [L]
&lt;/IfModule>
&lt;IfModule !mod_rewrite.c>
    ErrorDocument 404 /shpedng/index.php
&lt;/IfModule>
</pre>

File database.php di folder apps/config disesuaikan isian connection propertiesnya

<pre>
$db['default']['hostname'] = 'BPS-TRAINER02\SQL2012';
$db['default']['username'] = 'supas_oye';
$db['default']['password'] = 'supas_mei_5102-ok';
$db['default']['database'] = 'SHPED';
$db['default']['dbdriver'] = 'sqlsrv';
</pre>