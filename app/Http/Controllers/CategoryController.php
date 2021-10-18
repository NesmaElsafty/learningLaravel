<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Spatie\Translatable\HasTranslations;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $categories = Category::all();
        return response()->json([
            'success' => true,
            'categories'=> $categories
        ]);
       

        return view('categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        //
        $validated = $request->validated();


        $category = new category([
            'title' => $request->get('title[]')
        ]);

        $category->title = ['en' => $request->get('title_en'), 'ar' => $request->get('title_ar')];

        $category->save();


        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //el category hna bygebly kol l products elly y5osso l category elly el category_id 
            // bta3o = el category->id
        // $category = Category::with('products')->find($category->id);
        // $products = $category->products;

        // return view('categories.show',compact('category','products'));

        $category = Category::find($id);
        $data   = $category->getTranslations();
        // dd($getTranslation);    
        // $data = json_decode($category, true);

        // dd($category);
        return response()->json([
            'success' => true,
            'category'=> $category
        ]);

        return view('categories.show')->with('category',$category);

 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
       // $data = json_decode($category, true);
        $data = $category->getTranslations();
        return view('categories.edit',compact('category' , 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

       return redirect()->route('categories.index')
                       ->with('success','Category deleted successfully');
    }
}
