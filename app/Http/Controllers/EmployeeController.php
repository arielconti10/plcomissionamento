<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Shop;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::All();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();

        return view('employees.create', compact('shops'));
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
            'name' => 'required',
            'document' => 'required',
            'shop' => 'required',
            'email' => 'required'
        ]);

        $employee = new Employee([
            'name' => $request->get('name'),
            'document' => $request->get('document'),
            'shop_id' => $request->get('shop'),
            'email' => $request->get('email'),
        ]);

        $employee->save();

        return redirect('/employees')->with('success', 'Funcionário inserido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops = Shop::all();
        $employee = Employee::find($id);

        $total_comissions = 0;

        foreach($employee->contracts as $contract){
            $total_comissions += $contract->comission_value;
        }

        return view('employees.edit', compact('employee', 'shops', 'total_comissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'document' => 'required',
            'shop' => 'required',
            'email' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->get('name');
        $employee->document = $request->get('document');
        $employee->shop_id = $request->get('shop');
        $employee->email = $request->get('email');
        $employee->save();

        return redirect('/employees')->with('success', 'Funcionário atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Funcionário removido com sucesso');
    }
}
