<?php

namespace App\Http\Controllers;
// namespace App\Scopes\scopes;

use App\models\product;
use App\models\category;
use App\models\taxes;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;
use App\Http\Requests\MyOwnRequest;
// use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
            // $products = product::find(1);

            // foreach ($products->taxes as $tax) {
            //     echo $tax->pivot->created_at;
            // }
         $products = product::all();

        // $products = product::active()->orderBy('created_at')->get();

        // $products = DB::table('products')->where('active', 1)->get();

            // return response()->json([
        //     'success' => true,
        //     'products'=> $products
        // ]);

         // $products = product::where(function ($query) {
         //        $query->select ('*')
         //            ->from('products')
         //            ->where('active', 1);
         // })->get();
        

        return view('products.index', compact('products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        
        $taxes = taxes::all();
        return view('products.create', compact('category' , 'taxes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyOwnRequest $request)
    {
         
        // $validated = $request->validated();
        // dd($request->all());
         // $products = product::all();
        
        $product = new Product([
            'name' => $request->get('name[]'),
            'description' => $request->get('description[]'),
            'price' => $request->get('price'),
            'flag' => $request->get('flag')  ? $request->get('flag') : 0,
            'image' => $request->get('image'),
            'expired_date' => $request->get('expired_date'),
            'category_id' => $request->get('category_id')
        ]);


        $product->name = ['en' => $request->get('name_en'), 'ar' => $request->get('name_ar')];
        $product->description = ['en' => $request->get('description_en'), 'ar' => $request->get('description_ar')];
        $product->save();

        // $product->taxes()->attach($request->get('taxes'));

        $product->taxes()->sync($request->get('taxes'));
        


        return redirect('/products')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $category = Category::find($product->category_id);
        $taxes = $product->taxes;
        // dd($product->taxes);

        // return response()->json([
        //     'success' => true,
            
        //     'product'=>$product,
        //     'category'=>$category,
        //     'taxes'=>$taxes            
        // ]);

        return view('products.show',compact('product' ,'category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);
       $data = $product->getTranslations();

       $category = Category::all();
       $taxes = $product->taxes;
       
       $changeTaxes = taxes::all();
        return view('products.edit', compact('product' , 'category' , 'data' , 'taxes', 'changeTaxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MyOwnRequest $request, $id)
    {
        $validated = $request->validated();


        $product = product::find($id);
        $product->name =  $request->get('name[]');
        $product->description = $request->get('description[]');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->expired_date = $request->get('expired_date');
        $product->category_id = $request->get('category_id');

        $product->name = ['en' => $request->get('name_en'), 'ar' => $request->get('name_ar')];
        $product->description = ['en' => $request->get('description_en'), 'ar' => $request->get('description_ar')];

        $product->taxes()->syncWithoutDetaching($request->get('taxes'));


        $product->save();
 
        return redirect('/products')->with('success', 'product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'product deleted!');
    }
}
