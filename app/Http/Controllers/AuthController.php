<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private string $baseUrl = "http://10.100.104.128:5084/api/auth";

    public function showLogin()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        // Telefon raqamini tozalash: "+998 (94) 690-80-20" → "946908020"
        $phone = preg_replace('/\D/', '', $request->phone); // faqat raqamlar
        if (str_starts_with($phone, '998')) {
            $phone = substr($phone, 3); // "998" prefiksini olib tashlash
        }
        // 1-QADAM: Raqamni yuborish
        if ($request->step == 1) {
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(10)->post("{$this->baseUrl}/verify_number", [
                'phone_number' => $phone,
            ]);

            if ($response->successful() && $response->json('status')) {
                // User ma'lumotlarini sessiyaga saqlash
                session(['auth.user' => $response->json('data')]);

                // OTP yuborish
                Http::timeout(10)->post("{$this->baseUrl}/send_otp", [
                    'phone_number' => $phone,
                ]);

                return back()->with([
                    'step' => 2,
                    'phone' => $phone,
                ]);
            }

            return back()->withErrors(['phone' => "Raqam ro'yxatdan o'tmagan yoki xato."]);
        }

        // 2-QADAM: Kodni tekshirish
        if ($request->step == 2) {
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(10)->post("{$this->baseUrl}/verify_otp", [
                'phone_number' => $phone,
                'otp_code'     => $request->otp_code,
            ]);

            if ($response->successful() && $response->json('status')) {
                $token = $response->json('data.token');

                // /api/auth/me ga token bilan murojaat
                /** @var \Illuminate\Http\Client\Response $meResponse */
                $meResponse = Http::timeout(10)->withToken($token)->get("{$this->baseUrl}/me");
                if ($meResponse->successful() && $meResponse->json('status')) {
                    // Yangi ma'lumotlarni sessiyaga saqlaymiz
                    session(['auth.user' => $meResponse->json('data')]);
                }

                $user = session('auth.user', []);
                $userId = $user['user_id'] ?? $user['id'] ?? 0;

                // Device token saqlash (web browser uchun)
                Http::timeout(10)->post("{$this->baseUrl}/save_device_token", [
                    'user_id' => $userId,
                    'device_info' => [
                        'device_system'     => 'Web',
                        'model'             => $request->header('User-Agent', 'Browser'),
                        'device_id'         => session()->getId(),
                        'device_token'      => '',
                        'is_physical_device' => false,
                    ],
                ]);

                session(['auth_token' => $token]);
                return redirect()->route('undiruvchilar.index');
            }
    

            return back()->with([
                'step' => 2,
                'phone' => $phone,
            ])->withErrors(['otp_code' => "Kod noto'g'ri kiritildi."]);
        }
    }

    public function logout(Request $request)
    {
        $user = session('auth.user', []);
        $userId = $user['user_id'] ?? $user['id'] ?? 0;

        // API ga logout so'rov yuborish
        try {
            Http::timeout(10)->post("{$this->baseUrl}/logout", [
                'user_id' => $userId,
            ]);
        } catch (\Throwable) {
            // API xato qaytarsa ham chiqishni davom ettiramiz
        }

        // Sessiyani to'liq tozalash
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Tizimdan muvaffaqiyatli chiqdingiz.');
    }
}
