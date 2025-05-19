<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTraits;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::select('id', 'name_' . GeneralTraits::getCurrentLanguage() . ' as name')->get();
        return GeneralTraits::returnData('categories', $categories, 'Success');
    }

    public function getCategoryById(Request $request){
        $category = Category::find($request->id);
        if($category){
            return GeneralTraits::returnData('Category', $category, 'Success');
        }
        else{
            return GeneralTraits::returnError('F000', 'This Category not found');
        }
    }

    public function changeCategoryStatus(Request $request){
        Category::where('id', $request->id)->update(['active' => $request->active]);
        return GeneralTraits::returnSuccessMessage('The change of category\'s status is done');
    }
}
