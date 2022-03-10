<?php 


use App\Http\Controllers\Controller;


class Telegram extends Controller{

    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
}