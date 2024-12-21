<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createYearSubsciption(Request $request)
    {
        $apiUrl = env("MONO_API_URL");
        $apiToken = env("MONO_API_KEY");

        $amount = 5999;
        $message = 'Інформаційно-новинна підписки на газету Дейком на триста шістдесят п\'ять днів';

        if (!$apiToken) {
            return back()->withErrors('Токен API не знайдено');
        }

        $response = Http::withHeaders([
            'X-Token' => $apiToken,
        ])->post($apiUrl, [
                    'amount' => $amount,
                    'ccy' => 840,
                    'merchantPaymInfo' => [
                        'reference' => 'subscription_' . uniqid(),
                        'destination' => $message,
                    ],
                    "redirectUrl" => "https://daycom.com.ua/subscription",
                ]);

        if ($response->successful()) {
            $data = $response->json();

            $pageUrl = $data['pageUrl'] ?? null;

            if ($pageUrl) {
                return redirect()->away($pageUrl);
            } else {
                return back()->withErrors('Сторінку не знайдено');
            }
        } else {
            return back()->withErrors('Помилка при відправці запиту. Код помилки: ' . $response->status());
        }
    }
    public function createMonthSubsciption(Request $request)
    {
        $apiUrl = env("MONO_API_URL");
        $apiToken = env("MONO_API_KEY");

        $amount = 599;
        $message = 'Інформаційно-новинна підписки на газету Дейком на чотири тижні';

        if (!$apiToken) {
            return back()->withErrors('Токен API не знайдено');
        }

        $response = Http::withHeaders([
            'X-Token' => $apiToken,
        ])->post($apiUrl, [
                    'amount' => $amount,
                    'ccy' => 840,
                    'merchantPaymInfo' => [
                        'reference' => 'subscription_' . uniqid(),
                        'destination' => $message,
                    ],
                    "redirectUrl" => "https://daycom.com.ua/subscription",
                ]);

        if ($response->successful()) {
            $data = $response->json();

            $pageUrl = $data['pageUrl'] ?? null;

            if ($pageUrl) {
                return redirect()->away($pageUrl);
            } else {
                return back()->withErrors('Сторінку не знайдено');
            }
        } else {
            return back()->withErrors('Помилка при відправці запиту. Код помилки: ' . $response->status());
        }
    }
}
