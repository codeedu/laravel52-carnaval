<?php

namespace CodePub\Policies;

use CodePub\Models\Chapter;
use CodePub\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChapterPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Chapter $chapter)
    {
        return $chapter->book->user_id == $user->id;
    }

    public function before(User $user, $ability)
    {
        if($user->can('book_manage_all')) {
            return true;
        }
    }
}
