<img src="https://media1.tenor.com/images/b7cd57136bb82a1784bedc5408149eb1/tenor.gif" width=100%/>

# Hacker News

Hacker News Project!

README.md is a WIP...

If you find any errors/suggestions, please do open an issue!

## Installation

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
