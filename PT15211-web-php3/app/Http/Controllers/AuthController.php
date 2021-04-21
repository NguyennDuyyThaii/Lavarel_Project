<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Views;
use App\Models\Danhmuc;
use App\Models\Post;
use App\Http\Requests\SaveRegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function dashboard(Request $request)
    {
        // if(!($request->session()->has('login.success'))){
        //     return redirect(route('login'));
        // }
        $dm = Danhmuc::all();
        $p = Post::all();
        $u = User::all();

        $views = Views::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count'); // lấy tất cả mảng trả về các field đó
        $months = Views::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
           
        foreach ($months as $index => $month){
            $datas[$month-1] = $views[$index];
        }
        return view('auth.auth', [
            'dm' => $dm,
            'p' => $p,
            'u' => $u,
            'datas' => $datas
        ]);
    }
    public function user()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', 'like', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            if ($user->is_verified == 0) {
                return redirect(route('login'))->with('fail', 'Tài khoản đã đăng kí nhưng chưa xác thực email, hãy kiểm tra!');
            }
            return redirect(route('auth'))->with('login.success', 'Đăng nhập thành công!');
        } else {
            return redirect(route('login'))->with('fail', 'Có gì đó không đúng, có thể là mật khẩu sai, hãy kiểm tra!');
        }
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect(route('category.index'));
        // }

        // return redirect(route('login'))->with('fail', 'Đăng nhập thất bại, hãy thử lại');
    }


    public function register()
    {
        return view('auth.register');
    }
    public function postRegister(SaveRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();

        if ($user != null) {
            MailController::sendRegisterEmail($user->name, $user->email, $user->verification_code);
            return redirect()->back()->with('confirm.email', 'Tài khoản của bạn đã được gửi đăng kí, làm ơn hãy kiểm tra email để xác nhận');
        }

        return redirect()->back()->with('confirm.fail', 'Tài khoản này đã tồn tại, hãy kiểm tra lại!');
    }
    public function verify()
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where('verification_code', $verification_code)->first();
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect(route('login'))->with('confirm.success', 'Xác nhận tài khoản thành công, giờ bạn có thể đăng nhập!');
        }
        return redirect(route('login'))->with('confirm.failed', 'Có lỗi trong quá trình xác nhận email, hãy kiểm tra lại');
    }
}
