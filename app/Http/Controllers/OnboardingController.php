<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function check(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return response()->json([
            'is_first_login' => $user->is_first_login ?? false
        ]);
    }

    public function onboardingSurvey(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user->onboarding_job = $request->job;
        $user->onboarding_purpose = $request->purpose;
        $user->onboarding_workplace = $request->workplace;
        $user->onboarding_experience = $request->experience;
        $user->onboarding_age = $request->age;
        $user->is_first_login = false;
        $user->save();
        return response()->json(['success' => true]);
    }
}
