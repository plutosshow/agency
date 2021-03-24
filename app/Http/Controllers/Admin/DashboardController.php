<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FlatsController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flats;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(){
        $usersCount = User::count();
        $date = date('Y-m-d');
        return view('admin.dashboard')->with([
            'usersCount'            => $usersCount,
            'todayRegistrations'    => $this->getTodayRegistrations(),
            'countFlats'            => $this->countFlats(),
            'countActiveFlats'    => $this->activeFlats(),
        ]);
    }

    public function getTodayRegistrations(){
        $users = User::select('id')->where('created_at', '>=', Carbon::today())->get();
        return count($users);
    }

    public function activeFlats(){
        $relevant = Flats::select('id')->where('relevant','=', 1)->get();
        return count($relevant);
    }

    public function countFlats(){
       return Flats::count();
    }
}
