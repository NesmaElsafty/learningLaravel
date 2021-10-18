<?php
 
namespace App\Http\Controllers;

use App\Models\Taxes;
use Spatie\Translatable\HasTranslations;

use Illuminate\Http\Request;


class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taxes = taxes::all();

        return view('taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('taxes.create');
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'value' => 'required',
            'valueType' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // taxes::create($request->all());


        $taxes = new taxes([
            'name' => $request->get('name[]'),
            'value' => $request->get('value'),
            'valueType' => $request->get('valueType'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);


        $taxes->name = ['en' => $request->get('name_en'), 'ar' => $request->get('name_ar')];
        
       
        $taxes->save();

        return redirect('/taxes')->with('success', 'taxe saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxes = taxes::find($id);
        $data   = $taxes->getTranslations();

        return view('taxes.show',compact('taxes' , 'data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $taxes = taxes::find($id);
        $data = $taxes->getTranslations();

        
            return view('taxes.edit', compact('taxes' , 'data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'value' => 'required',
            'valueType' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);


        $taxes = taxes::find($id);
        $taxes->name =  $request->get('name[]');
        $taxes->value = $request->get('value');
        $taxes->valueType = $request->get('valueType');
        $taxes->start_date = $request->get('start_date');
        $taxes->end_date = $request->get('end_date');

        $taxes->name = ['en' => $request->get('name_en'), 'ar' => $request->get('name_ar')];

        $taxes->save();

        return redirect('/taxes')->with('success', 'taxes updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxes $tax)
    {
        //
        $tax->delete();

        return redirect()->route('taxes.index')
                        ->with('success','taxe deleted successfully');
    }
}
