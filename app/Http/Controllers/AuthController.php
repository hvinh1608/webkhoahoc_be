<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = KhachHang::where('email', $githubUser->getEmail())->first();
        $isFirstLogin = 0;

        if ($user) {
            // Nếu provider khác github thì báo lỗi
            if ($user->provider !== 'github') {
                return redirect('http://localhost:5173/khach-hang/dang-nhap?error=email_exists');
            }
        } else {
            // Tạo user mới
            $user = KhachHang::create([
                'ho_va_ten' => $githubUser->getName() ?? $githubUser->getNickname(),
                'email' => $githubUser->getEmail(),
                'password' => bcrypt(uniqid()),
                'so_dien_thoai' => '',
                'ngay_sinh' => '1990-01-01',
                'is_active' => 1,
                'is_first_login' => true,
                'provider' => 'github'
            ]);
            $isFirstLogin = 1;

            // Tạo coupon giảm giá
            $couponCode = 'GD-' . now()->format('Ymd') . '-' . \Illuminate\Support\Str::upper(Str::random(4));
            \App\Models\Coupon::create([
                'code' => $couponCode,
                'value' => 10,
                'type' => 'percent',
                'expiry_date' => now()->addDays(3),
            ]);

            // Gửi mail chào mừng
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user, $couponCode));

            // Cập nhật trạng thái lần đầu đăng nhập
            // $user->is_first_login = false;
            // $user->save();
        }

        $token = $user->createToken('github')->plainTextToken;

        return redirect("http://localhost:5173/khach-hang/dang-nhap?token=$token&is_first_login=$isFirstLogin&provider=github");
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {
        $fbUser = Socialite::driver('facebook')->stateless()->user();

        $user = KhachHang::where('email', $fbUser->getEmail())->first();
        $isFirstLogin = 0;

        if ($user) {
            // Nếu provider khác facebook thì báo lỗi
            if ($user->provider !== 'facebook') {
                return redirect('http://localhost:5173/khach-hang/dang-nhap?error=email_exists');
            }
        } else {
            // Tạo user mới
            $user = KhachHang::create([
                'ho_va_ten' => $fbUser->getName(),
                'email' => $fbUser->getEmail(),
                'password' => bcrypt(uniqid()),
                'so_dien_thoai' => '',
                'ngay_sinh' => '1990-01-01',
                'is_active' => 1,
                'is_first_login' => true,
                'provider' => 'facebook'
            ]);
            $isFirstLogin = 1;

            // Tạo coupon giảm giá
            $couponCode = 'GD-' . now()->format('Ymd') . '-' . \Illuminate\Support\Str::upper(Str::random(4));
            \App\Models\Coupon::create([
                'code' => $couponCode,
                'value' => 10,
                'type' => 'percent',
                'expiry_date' => now()->addDays(3),
            ]);

            // Gửi mail chào mừng
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user, $couponCode));

            // Cập nhật trạng thái lần đầu đăng nhập
            // $user->is_first_login = false;
            // $user->save();
        }


        $token = $user->createToken('facebook')->plainTextToken;

        return redirect("http://localhost:5173/khach-hang/dang-nhap?token=$token&is_first_login=$isFirstLogin&provider=facebook");
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('http://localhost:5173/khach-hang/dang-nhap?error=google_login');
        }

        $email = $googleUser->getEmail();
        $name = $googleUser->getName() ?? 'Người dùng Google';

        $user = KhachHang::where('email', $email)->first();
        $isFirstLogin = 0;

        if ($user) {
            if ($user->provider !== 'google') {
                return redirect('http://localhost:5173/khach-hang/dang-nhap?error=email_exists');
            }
            $token = $user->createToken('key_khach_hang')->plainTextToken;
        } else {
            $user = KhachHang::create([
                'ho_va_ten' => $name,
                'email' => $email,
                'password' => bcrypt(Str::random(16)),
                'so_dien_thoai' => '',
                'ngay_sinh' => '1990-01-01',
                'is_active' => 1,
                'is_first_login' => true,
                'provider' => 'google'
            ]);
            $isFirstLogin = 1;

            // Tạo coupon, gửi mail nếu muốn
            $couponCode = 'GD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(4));
            \App\Models\Coupon::create([
                'code' => $couponCode,
                'value' => 10,
                'type' => 'percent',
                'expiry_date' => now()->addDays(3),
            ]);
            Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user, $couponCode));

            // Cập nhật trạng thái lần đầu đăng nhập
            // $user->is_first_login = false;
            // $user->save();

            $token = $user->createToken('key_khach_hang')->plainTextToken;
        }

        // Redirect về FE với token, is_first_login, provider
        return redirect("http://localhost:5173/khach-hang/dang-nhap?token=$token&is_first_login=$isFirstLogin&provider=google");
    }


    public function redirectToDribbble()
    {
        return Socialite::driver('dribbble')->redirect();
    }

    public function handleDribbbleCallback()
    {
        try {
            $dribbbleUser = Socialite::driver('dribbble')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('http://localhost:5173/khach-hang/dang-nhap?error=dribbble_login');
        }

        $email = $dribbbleUser->getEmail();
        $name = $dribbbleUser->getName() ?? 'Dribbble User';

        $user = KhachHang::where('email', $email)->first();
        $isFirstLogin = 0;

        if ($user) {
            if ($user->provider !== 'dribbble') {
                return redirect('http://localhost:5173/khach-hang/dang-nhap?error=email_exists');
            }
            $token = $user->createToken('key_khach_hang')->plainTextToken;
        } else {
            $user = KhachHang::create([
                'ho_va_ten' => $name,
                'email' => $email,
                'password' => bcrypt(Str::random(16)),
                'so_dien_thoai' => '',
                'ngay_sinh' => '1990-01-01',
                'is_active' => 1,
                'is_first_login' => true,
                'provider' => 'dribbble'
            ]);
            $isFirstLogin = 1;

            // Tạo coupon, gửi mail
            $couponCode = 'GD-' . now()->format('Ymd') . '-' . \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(4));
            \App\Models\Coupon::create([
                'code' => $couponCode,
                'value' => 10,
                'type' => 'percent',
                'expiry_date' => now()->addDays(3),
            ]);
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user, $couponCode));

            // Cập nhật trạng thái lần đầu đăng nhập
            // $user->is_first_login = false;
            // $user->save();

            $token = $user->createToken('key_khach_hang')->plainTextToken;
        }

        return redirect("http://localhost:5173/khach-hang/dang-nhap?token=$token&is_first_login=$isFirstLogin&provider=dribbble");
    }
}
