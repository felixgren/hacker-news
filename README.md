<img src="https://media1.tenor.com/images/b7cd57136bb82a1784bedc5408149eb1/tenor.gif" width=100%/>

# Hacker News

Hacker News Project!

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
### Code Review
1. Updating avatar doesn't work properly
2. Doesn't seem like i'm able to post comments on posts
3. PostController has many routes in web.php could probably use Postcontroller::resource to reduce amount of code there.
4. Nice choice of going with Vue, did you try to implement route-model binding?
5. Might wanna add some extra verification in PostController::store, to prevent empty content input. Nice that you have protection for title.
6. Doesn't seem like i can sort based on likes?

7) You have body input length verification in updating post, so that's nice!
8) You protect the backend with $this->authorize in PostController which is good, Could possibly be a usecase in PostLikeControllers, store and destroy method aswell?
9) In your PostFactory you could probably call the User::factory, if you wanted to make development easier and generate random posts easily.
10) Overall nice job!
