<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\AdminUser;

class TestController extends Controller
{
    public function create()
    {
        return view('test.create');
    }

    public function enter(Request $request)
    {
        try {
            $username = $request->get('username', null);
            $agent = AdminUser::where('username', $username)->first();
            if (!$agent) {
                throw new Exception("找不到代理");
            }

            $substation = $agent->substation;

            return redirect()->route('test.game', [
                'token' => $substation->token,
            ]);
        } catch (Exception $e) {
            return redirect()->route('test.error')->withError([
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function game(request $request, string $token)
    {
        return view('welcome');
    }

    public function error(request $request)
    {
        $error = $request->session()->get('error');
        if($error){
            return view('test.error')->withError($error);
        }
        abort(404);
    }
}
