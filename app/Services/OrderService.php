<?php


namespace CodePub\Services;


use CodePub\Models\BookInterface;
use CodePub\Models\Order;
use CodePub\Models\User;

class OrderService
{

    public function process(BookInterface $book, User $user, $token)
    {
        $charge = $user->charge(number_format($book->price, 2, "", ""), [
            'source' => $token,
            'receipt_email' => $user->email
        ]);

        if ($charge) {
            Order::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'price' => $book->price
            ]);
            return true;
        }
        return false;
    }
}