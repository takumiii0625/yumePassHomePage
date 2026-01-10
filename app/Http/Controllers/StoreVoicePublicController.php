<?php

namespace App\Http\Controllers;

use App\Models\StoreVoice;
use Carbon\Carbon;

class StoreVoicePublicController extends Controller
{
    public function show($id)
    {
        $voice = StoreVoice::where('delete_flg', 0)
            ->where('is_published', 1)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->with(['store:id,name'])
            ->findOrFail($id);

        return view('store_voices/show', compact('voice'));
    }
}
