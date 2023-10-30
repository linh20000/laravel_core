<?php

namespace App\Http\Controllers\Admin\Lang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
        'ja',
        'ka',
        'ko',
        'zh',
    ];
    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);
            return redirect()->back();
        }
    }
}
