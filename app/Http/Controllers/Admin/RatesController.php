<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rates::orderBy('id', 'asc')->get();
        return view('admin.rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:20', 'min:4','regex:/^[А-Яа-яЁё\s-]+$/u'],
            'content'=>['required','max:250', 'min:4'],
            'speed' => ['required', 'max:5', 'min:2', 'regex:/^[ 0-9]+$/'],
            'price' => ['required', 'max:10', 'min:2', 'regex:/^[ 0-9]+$/'],
        ]);
        
        $new_rates = new Rates();
        $new_rates->title = $request->title;
        $new_rates->content = $request->content;
        $new_rates->speed = $request->speed;
        $new_rates->price = $request->price;
        $new_rates->save();

        if ($new_rates->save()) {
            return redirect()->back()->withSuccess('Тариф был успешно добавлен.');
        } 
        else {
            return redirect()->back()->with('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function show(Rates $rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rates = Rates::find($id);
        return view('admin.rates.edit', ['rates' => $rates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:20', 'min:4','regex:/^[А-Яа-яЁё\s-]+$/u'],
            'content'=>['required','max:250', 'min:4'],
            'speed' => ['required', 'max:5', 'min:2', 'regex:/^[ 0-9]+$/'],
            'price' => ['required', 'max:10', 'min:2', 'regex:/^[ 0-9]+$/'],
        ]);
        
        $rates = Rates::find($id);
        $rates->title = $request->title;
        $rates->content = $request->content;
        $rates->speed = $request->speed;
        $rates->price = $request->price;

        if ($rates->save()) {
            return redirect()->back()->withSuccess('Тариф был успешно обновлён.');
        } 
        else {
            return redirect()->back()->with('error');
        }
    }

    // Метод для обновления ячейки скорости
    public function saveMe(Request $request){

        $value = $request->input('value');
        $field = $request->input('field');
        $id = $request->input('id');

        $update = Rates::where('id','=',$id)
                    ->update([$field => $value]);
        
        if(!$update){
            return response()->json([1]);
        }else{
            return response()->json([2]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rates = Rates::find($id);
        $rates->delete();

        return redirect()->back()->withSuccess('Тариф был успешно удалён.');
    }
}
