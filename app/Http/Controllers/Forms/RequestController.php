<?php

namespace App\Http\Controllers\Forms;

use App\Models\Requests;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Request;
use App\Http\Requests\FormRequestRequest;

class RequestController extends Controller
{
    public function submit(FormRequestRequest $request)
    {
        $server = Request::server('HTTP_REFERER');

        $formRequest = new Requests();

        $formRequest->name = $request->input('name');
        $formRequest->phone = $request->input('phone');

        $formRequest->save();

        return redirect($server)->with('success', 'Ваш запрос на обратную связь был принят. Наш агент свяжется с вами в ближайшее время');
    }
}
