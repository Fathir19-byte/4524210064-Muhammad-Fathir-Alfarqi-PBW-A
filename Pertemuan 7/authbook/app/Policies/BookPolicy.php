<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    /**
     * Determine whether the user can view any models.
     * Admin, Staff, Viewer can view list.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    /**
     * Determine whether the user can view the model.
     * Admin, Staff, Viewer can view detail.
     */
    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    /**
     * Determine whether the user can create models.
     * Admin and Staff can create. Viewer cannot.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    /**
     * Determine whether the user can update the model.
     * Admin and Staff can edit. Viewer cannot.
     */
    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    /**
     * Determine whether the user can delete the model.
     * Only Admin can delete.
     */
    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can bulk delete models.
     * Only Admin can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }
}
