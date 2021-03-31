<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FlatsController;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flats;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $usersCount = User::count();
        $date = date('Y-m-d');
        return view('admin.dashboard')->with([
            'usersCount'            => $usersCount,
            'todayRegistrations'    => $this->getTodayRegistrations(),
            'countFlats'            => $this->countFlats(),
            'countActiveFlats'      => $this->activeFlats(),
            'countExecutedRequest'  => $this->countExecutedRequest(),
            'countRequest'          => $this->countReqeust(),
            'countTodayRequest'     => $this->countTodayRequest()
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

    public function countReqeust(){
        return Requests::select('id')->where('executed', '0')->count();
    }
    public function countExecutedRequest(){
        return DB::table('requests')->where('executed', '1')->count();
    }

    public function countTodayRequest(){
        return Requests::select('id')->where('executed', '1')->where('created_at', '>=', Carbon::today())->count();
    }
}
