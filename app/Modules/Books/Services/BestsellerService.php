<?php

namespace App\Modules\Books\Services;

use App\Modules\Base\Services\Service;
use App\Modules\Books\Models\Bestseller;
use Illuminate\Support\Facades\App;

class BestsellerService extends Service
{
    public function __construct(Bestseller $model)
    {
        parent::__construct($model);
    }

    public function getBestsellers() {
        $language = App::getLocale();
        return $this->model
            ->with(['translations' => function($query) use ($language) {
                $query->where('language', $language);
            }])
            ->get();
    }
}
