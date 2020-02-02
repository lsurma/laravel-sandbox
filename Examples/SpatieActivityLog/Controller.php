<?php

namespace Examples\SpatieActivityLog;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $this->test();
        } catch (\Throwable $e) {
            // ;(
            debug($e);
        }

        dump(Activity::getActivityGroup());

        // Activity::log(function() {
        //     dump(Activity::getActivityGroup());

        //     Activity::log(function() {

        //         dump(Activity::getActivityGroup());
        //     });
    
        //     dump(Activity::getActivityGroup());
        // });

        // Activity::log(function() {
        //     dump(Activity::getActivityGroup());
        // });

        // dump(Activity::getActivityGroup());

        return 'spatie.act.log';
    }

    public function test()
    {
        Activity::log(function() {
            dump(Activity::getActivityGroup());

            throw new ModelNotFoundException();
        });
    }
}
