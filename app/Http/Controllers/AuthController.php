<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Exception;

class AuthController extends Controller
{
    public function __construct(protected ApiService $api)
    {
    }

    public function showLogin()
    {
        try {
            return view('auth.login');
        } catch (Exception $e) {
            return back()->with('error', "Xatolik yuz berdi: " . $e->getMessage());
        }
    }

    public function handleLogin(Request $request)
    {
        try {
            // Telefon raqamini tozalash: "+998 (94) 690-80-20" → "946908020"
            $phone = preg_replace('/\D/', '', $request->phone); // faqat raqamlar
            if (str_starts_with($phone, '998')) {
                $phone = substr($phone, 3); // "998" prefiksini olib tashlash
            }
            // 1-QADAM: Raqamni yuborish
            if ($request->step == 1) {
                /** @var \Illuminate\Http\Client\Response $response */
                $response = $this->api->post("/auth/verify_number", [
                    'phone_number' => $phone,
                ]);

                if ($response->successful() && $response->json('status')) {
                    // User ma'lumotlarini sessiyaga saqlash
                    session(['auth.user' => $response->json('data')]);

                    // OTP yuborish
                    $this->api->post("/auth/send_otp", [
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
                $response = $this->api->post("/auth/verify_otp", [
                    'phone_number' => $phone,
                    'otp_code'     => $request->otp_code,
                ]);

                if ($response->successful() && $response->json('status')) {
                    $token = $response->json('data.token');

                    // /api/auth/me ga token bilan murojaat
                    /** @var \Illuminate\Http\Client\Response $meResponse */
                    $meResponse = $this->api->client()->withToken($token)->get("/auth/me");
                    if ($meResponse->successful() && $meResponse->json('status')) {
                        // Yangi ma'lumotlarni sessiyaga saqlaymiz
                        session(['auth.user' => $meResponse->json('data')]);
                    }

                    $user = session('auth.user', []);
                    $userId = $user['user_id'] ?? $user['id'] ?? 0;

                    // Device token saqlash (web browser uchun)
                    $this->api->post("/auth/save_device_token", [
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
            
            return back()->withErrors(['phone' => "Noto'g'ri qadam so'rovi."]);
        } catch (Exception $e) {
            return back()->with('error', "Tizimda xatolik yuz berdi: " . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = session('auth.user', []);
            $userId = $user['user_id'] ?? $user['id'] ?? 0;

            // API ga logout so'rov yuborish
            $this->api->post("/auth/logout", [
                'user_id' => $userId,
            ]);
        } catch (Exception $e) {
            // API xato qaytarsa ham chiqishni davom ettiramiz
        } finally {
            // Sessiyani to'liq tozalash
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('success', 'Tizimdan muvaffaqiyatli chiqdingiz.');
        }
    }
}
