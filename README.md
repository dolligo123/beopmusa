# beopmusa
법무사넷

# .htaccess 파일 추가
.htaccess 파일 추가 요망  
/adm/.htaccess 파일 추가 요망

파일 내용
```
<IfModule mod_rewrite.c>
    RewriteEngine On
	# RewriteBase /
	RewriteCond %{SERVER_PORT} 80
	# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [R,L]
	RewriteCond $1 !^(index\.php|images|captcha|data|include|uploads|robots|\.txt)
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>


php_value upload_max_filesize 64M
php_value post_max_size 64M
php_value max_execution_time 300
php_value max_input_time 300

SetEnv CI_ENV development
SetEnv DB_HOST_NAME host.docker.internal
SetEnv DB_USER root
SetEnv DB_PASSWORD 12345
SetEnv DB_DATABASE beopmusa
SetEnv DB_PORT 3307
```