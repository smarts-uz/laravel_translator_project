<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function edit(Request $request)
    {
        $translations=Translation::where('lang', $request->lang)->paginate(50);
        return view('translations', compact('translations', $translations))->with(['lang'=>$request->lang]);
    }

    public function search(Request $request)
    {
        if($request->search_item){
            $translations=Translation::where('lang_value', $request->search_item)->orWhere('lang_key', $request->search_item)->paginate(50);
            return view('translations', compact('translations', $translations))->with(['lang'=>$request->lang]);
        }

    }

    public function store(Request $request)
    {
        $lang=$request->lang;
        $translation = Translation::where('lang', $lang);
        foreach ($request->values as $key => $value) {
            $translation_def = $translation->where('lang_key', $key)->first();
            if($translation_def == null){
                $translation_def = new Translation;
                $translation_def->lang = $lang;
                $translation_def->lang_key = $key;
                $translation_def->lang_value = $value;
                $translation_def->save();
            }else {
                $translation_def->lang_value = $value;
                $translation_def->save();
            }
        }
        return back();
    }


    public function destroy($id)
    {

        $translation = Translation::findOrFail($id);
        if (env('DEFAULT_LANGUAGE') == $translation->lang) {
            // flash(translate('Default language can not be deleted'))->error();
        }
        else {
            Translation::destroy($id);
            // flash(translate('Language has been deleted successfully'))->success();
        }
        return back();
    }
}
