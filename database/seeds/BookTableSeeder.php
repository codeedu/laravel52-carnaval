<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = factory(\CodePub\Models\User::class)->create([
           'name' => 'Author da Silva',
            'email'=>'author@admin.com',
            'password'=>bcrypt(123456)
        ]);

        $author2 = factory(\CodePub\Models\User::class)->create([
            'name' => 'Author 2 da Silva',
            'email'=>'author2@admin.com',
            'password'=>bcrypt(123456)
        ]);

        factory(\CodePub\Models\Book::class, 2)->create([
            'user_id'=>$author->id
        ]);

        factory(\CodePub\Models\Book::class, 2)->create([
            'user_id'=>$author2->id
        ]);

        $book_manage = factory(\CodePub\Models\Permission::class)->create([
           'name'=>'book_manage_all',
            'description'=>'Can Manage All books'
        ]);

        $roleManager = \CodePub\Models\Role::whereName('Manager')->first();
        $roleManager->addPermission($book_manage);
    }
}
