<?php

namespace CodePub\Policies;

use CodePub\Models\Book;
use CodePub\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Book $book) {
        return $user->id == $book->user_id;
    }

    public function before(User $user, $ability)
    {
        if($user->can('book_manage_all')) {
            return true;
        }
    }
}
