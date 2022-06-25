<?php
namespace Database\Seeders;

use App\Author;
use App\Book;
use App\BookReview;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 5)->create();
        $admin = factory(User::class, 1)->state('admin')->create();

        factory(Author::class, 15)->create()->each(function (Author $author) {
            factory(Book::class, 3)->create()->each(function (Book $book) use ($author) {
                $book->authors()->saveMany([
                    $author,
                ]);
            });
        });

        Book::all()->each(function (Book $book) use ($users) {
            $reviews = factory(BookReview::class, 4)->make();
            $reviews->each(function (BookReview $review) use ($users) {
                $review->user()->associate($users->random());
            });
            $book->reviews()->saveMany($reviews);
        });
    }
}
