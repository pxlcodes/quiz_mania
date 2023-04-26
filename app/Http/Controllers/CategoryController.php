<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Imports\CategoryImport;
use App\Models\Category;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{

    public function index(): \Inertia\Response
    {

        $categories = Category::withCount('questions')->get();

        return Inertia::render('Categories/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new CategoryImport(), $request->file('file'));
        }

        $input = $request->input();
        $input['icon'] = preg_replace('/class=".*?"/', '', $request->get('icon'));
        dd($input);


        $category = Category::create($input);

        return redirect()->route('categories.show', $category->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Inertia\Response
     */
    public function show(Category $category): \Inertia\Response
    {
        $questions = $category->questions()->with('options')->get();

        $answered = $questions->where('answered', true)->count();
        $total = $questions->count();

        return Inertia::render('Questions/Index', [
            'questions' => $questions,
            'answered' => $answered,
            'total' => $total,
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
