<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptchaV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // dd($validated);

        $response = Http::post('https://api.web3forms.com/submit', $request->except(''));

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } else {
            return redirect()->back()->withErrors('Form submission failed!');
        }
    }
}
