<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class Translations extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $locale = App::getLocale();

        $translations = Cache::rememberForever("translations_$locale", function () use($locale){

        //dd(App::langPath($locale));
        if(File::exists(App::langPath($locale))){
            $phpTranslations = collect(File::allFiles(App::langPath($locale)))->filter(function ($file){
                return $file->getExtension() === "php";
            })->flatMap(function ($file){
                return Arr::dot(File::getRequire($file->getRealPath()));
            });
        }

        return $phpTranslations;
    });
        return view('components.translations', [
            'translations' => $translations,
        ]);
    }
}
