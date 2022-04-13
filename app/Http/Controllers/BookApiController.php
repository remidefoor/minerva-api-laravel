<?php

namespace App\Http\Controllers;

use App\Modules\Books\Services\BestsellerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookApiController
{
    const DEFAULT_LANGUAGE = 'en';

    public function getBestsellers(BestsellerService $service, Request $request) {
        $language = $request->query('language');
        if ($language == null) $language = self::DEFAULT_LANGUAGE;
        App::setLocale($language);
        $bestsellers = $service->getBestsellers();
        return response($bestsellers)
            ->setStatusCode(200);
    }
}
