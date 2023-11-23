# Prerequites
These must be installed in your machine to be able to run this locally.
1. PHP 8.2
2. Composer
3. MySQL5.7
4. DB GUI Manager like PHPMyAdmin or DBeaver (preferred)

# Running Locally
1. Create your database (like "siaproject")

2. Restore the SQL dump file to your database (which we assume is "siaproject")

3. Add your mysql password and host (`localhost` or `127.0.0.1`) to `config/config.php`

4. Run this command to install composer dependencies.
```
composer install
```
- If you run into an error saying "The authenticity of host 'gitlab.com (172.65.251.78)' can't be established" and asks "Are you sure you want to continue connecting (yes/no/[fingerprint])?", just press `Enter` and it will try to download again properly.

5. Run this command first to spin-up a local PHP server to serve the files
```
php -S localhost:8081
```

6. After the development server is finished setting up, go to your browser and access [localhost:8081](localhost:8081).

7. Done!