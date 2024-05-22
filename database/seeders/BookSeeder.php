<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // (user_id: 1)
        Book::create([
            'user_id' => 1,
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'A novel set in the Jazz Age',
            'genre' => 'Romantic',
            'publication_year' => 1925,
            'cover_image' => null,
        ]);

        Book::create([
            'user_id' => 1,
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'description' => 'A novel about racial injustice',
            'genre' => 'Drama',
            'publication_year' => 1960,
            'cover_image' => null,
        ]);

        // (user_id: 2)
        Book::create([
            'user_id' => 2,
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'A dystopian social science fiction novel',
            'genre' => 'Sci-Fi',
            'publication_year' => 1949,
            'cover_image' => null,
        ]);

        Book::create([
            'user_id' => 2,
            'title' => 'Brave New World',
            'author' => 'Aldous Huxley',
            'description' => 'A dystopian social science fiction novel',
            'genre' => 'Sci-Fi',
            'publication_year' => 1932,
            'cover_image' => null,
        ]);

        // (user_id: 3)
        Book::create([
            'user_id' => 3,
            'title' => 'Moby Dick',
            'author' => 'Herman Melville',
            'description' => 'A novel about the voyage of the whaling ship Pequod',
            'genre' => 'Adventure',
            'publication_year' => 1903,
            'cover_image' => null,
        ]);

        Book::create([
            'user_id' => 3,
            'title' => 'War and Peace',
            'author' => 'Leo Tolstoy',
            'description' => 'A novel that chronicles the history of the French invasion of Russia',
            'genre' => 'Historical',
            'publication_year' => 1969,
            'cover_image' => null,
        ]);
    }
}
