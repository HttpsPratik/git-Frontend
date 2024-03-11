<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Service\CategoryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    { }

    public function index()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('dashboard.pages.categories', compact('categories'));
    }

    public function allCategoryName(){
        $categories = $this->categoryService->getCategoryName();
        return response()->json($categories, 202);
    }

    public function store(CategoryStoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->categoryService->categoryStore($request->validated());
            DB::commit();
            return redirect('/dashboard/categories');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function update(CategoryUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->categoryService->categoryUpdate($request->validated());
            DB::commit();
            return redirect('/dashboard/categories');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function destroy($category_id)
    {
        try{
            DB::beginTransaction();
            $this->categoryService->categoryDelete($category_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/categories'], 202);
        } catch(\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

}
