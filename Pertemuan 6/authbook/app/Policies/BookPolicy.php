<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua user bisa lihat list
    }

    public function view(User $user, Book $book): bool
    {
        return true; // Semua user bisa lihat detail
    }

    public function create(User $user): bool
    {
        return true; // Semua user bisa buat buku baru
    }

    public function update(User $user, Book $book): bool
    {
        return true; // Semua user bisa edit
    }

    public function delete(User $user, Book $book): bool
    {
        return true; // Semua user bisa hapus
    }

    public function restore(User $user, Book $book): bool
    {
        return true;
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return true;
    }
}
