<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat user untuk masing-masing role (admin, staff, viewer)
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => 'password',
                'role' => 'admin',
            ]
        );
        $admin->update(['role' => 'admin']);

        $staff = User::firstOrCreate(
            ['email' => 'staff@example.com'],
            [
                'name' => 'Staff User',
                'password' => 'password',
                'role' => 'staff',
            ]
        );
        $staff->update(['role' => 'staff']);

        $viewer = User::firstOrCreate(
            ['email' => 'viewer@example.com'],
            [
                'name' => 'Viewer User',
                'password' => 'password',
                'role' => 'viewer',
            ]
        );
        $viewer->update(['role' => 'viewer']);

        // 2. Buat data Categories
        $categoryNames = [
            'Fiction',
            'Non-Fiction',
            'Technology',
            'Science',
            'History',
            'Fantasy',
            'Biography',
            'Philosophy',
        ];

        $categories = collect($categoryNames)->map(function ($name) {
            return Category::firstOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            );
        });

        // 3. Buat 10 authors jika belum ada
        if (Author::count() < 10) {
            Author::factory(10 - Author::count())->create();
        }
        $authors = Author::all();

        // 4. Buat 50 books jika belum ada atau update existing books
        if (Book::count() < 50) {
            Book::factory(50 - Book::count())->create([
                'author_id' => fn() => $authors->random()->id,
            ]);
        }

        // Attach categories to books & ensure description exists
        Book::all()->each(function (Book $book) use ($categories) {
            if ($book->categories()->count() === 0) {
                $randomCategories = $categories->random(rand(1, 3))->pluck('id');
                $book->categories()->syncWithoutDetaching($randomCategories);
            }
            if (empty($book->description)) {
                $book->update(['description' => fake()->paragraph()]);
            }
        });
    }
}
