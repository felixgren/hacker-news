<img src="https://media1.tenor.com/images/b7cd57136bb82a1784bedc5408149eb1/tenor.gif" width=100%/>

# Hacker News

Hacker News Project!

README.md is a WIP...

If you find any errors/suggestions, please do open an issue!

## Installation

New to Laravel? [Here is a good starting point](https://laravel.com/docs/8.x/installation)

**Prerequisites**
- PHP 8
- Composer
- npm

**Setting up project**
```
git clone https://github.com/felixgren/hacker-news.git
cd hacker-news
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan serve
```

<details>
<summary>Setting up avatars</summary>
    The avatars are currently only stored in the S3 cloud, to use this feature you will have to create a bucket and add the keys to your .env file. You can then run `php artisan queue:work` to process and upload the images, any error message can be located in your database. Send me a message and I'll generate some keys for you to use.
</details>

<details>
<summary>Installing PHP, Composer, npm</summary>

<details>
<summary>PHP</summary>

**Windows (WSL)**

```sh
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt-get install --yes php8.0 php-sqlite3 php-mysql php-xml php-cli php-mbstring curl git unzip
```

**macOS**

```sh
brew install php
```

</details>

<details>
<summary>Composer</summary>

**Windows (WSL)**

```sh
sudo apt install php-cli unzip
curl -sS https://getcomposer.org/installer -o composer-setup.php
HASH=`curl -sS https://composer.github.io/installer.sig`
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

**macOS**

```sh
brew install composer
```

</details>

<details>
<summary>Node.js and npm</summary>

**Windows (WSL)**

```sh
curl -sL https://deb.nodesource.com/setup_15.x | sudo -E bash -
sudo apt-get install -y nodejs
```

**macOS**

```sh
brew install node
```

</details>
</details>
