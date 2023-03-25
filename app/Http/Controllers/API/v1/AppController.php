<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\v1\BaseController as BaseController;
use App\Models\ProductCategory;

class AppController extends BaseController
{
    public function categories()
    {
        $categories = ProductCategory::all();
        $this->sendResponse($categories, 'Categories fetched successfully');
    }
}
