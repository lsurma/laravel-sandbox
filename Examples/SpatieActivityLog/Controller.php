<?php

namespace Examples\SpatieActivityLog;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Log related activities together
        Activity::log(function() {

            /** @var BookStore $bookStore */
            $bookStore = BookStore::firstOrCreate(['name' => 'Example bookstore 5']);

            // Add
            $book = Book::firstOrNew(['name' => 'Book X2']);

            $bookStore->books()->save($book);

            // Nested activity MUST NOT override activity group in his parent
            Activity::log(function() use ($bookStore) {

                $bookStore->books()->save(
                    Book::firstOrNew(['name' => 'Book X6'])
                );
    
            });

        });
        

        return 'spatie.act.log';
    }
}
