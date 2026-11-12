<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::all()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse|\Illuminate\Http\JsonResponse
    {
        $data = $request->except(['_token']);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value ?? '',
                    'label' => ucwords(str_replace('_', ' ', $key)),
                ]
            );
            Cache::forget("site_setting_{$key}");
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Settings saved successfully! Changes are live across the website.',
            ]);
        }

        return back()->with('success', 'Site settings and brand configurations have been saved successfully!');
    }
}

