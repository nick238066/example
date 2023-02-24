<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\AdminUser;
use Auth;

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

            $credentials = request(['email', 'password']);
            // if (! $token = auth('api')->attempt($credentials)) {
            //     throw new Exception("401 Unauthorized");
            // }

            if (!Auth::attempt($credentials, true)) {
                throw new Exception("401 Unauthorized");
            }

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
        $data = [
            'token' => $token,
        ];

        return view('test.game', $data);
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
