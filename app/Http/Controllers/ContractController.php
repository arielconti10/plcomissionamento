<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contracts;
use App\Employee;
use Illuminate\Http\Request;

class ContractController extends Controller
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
        $contracts = Contracts::All();

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all();

        return view('contracts.create', compact('clients', 'employees'));
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
            'value' => 'required',
            'contract_type' => 'required',
            'organ' => 'required',
            'bank' => 'required',
            'employee' => 'required',
            'client' => 'required',
            'comission_percentage' => 'required',
//            'comission_value' => 'required',
        ]);

        $contract = new Contracts([
            'value' => $request->get('value'),
            'contract_type' => $request->get('contract_type'),
            'organ' => $request->get('organ'),
            'bank' => $request->get('bank'),
            'employee_id' => $request->get('employee'),
            'client_id' => $request->get('client'),
            'comission_percentage' => $request->get('comission_percentage'),
            'comission_value' => $request->get('value') * $request->get('comission_percentage') / 100,
        ]);

        $contract->save();

        return redirect('/contracts')->with('success', ' inserido com sucesso');
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
        $contract = Contracts::find($id);
        $clients = Client::all();
        $employees = Employee::all();

        return view('contracts.edit', compact('contract', 'clients', 'employees'));
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
            'name'=>'required',
            'document'=> 'required|integer',
            'telephone' => 'required|integer'
        ]);

        $contract = Contracts::find($id);
        $contract->name = $request->get('name');
        $contract->document = $request->get('document');
        $contract->telephone = $request->get('telephone');
        $contract->save();

        return redirect('/contracts')->with('success', 'contracte atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contracts::find($id);
        $contract->delete();

        return redirect('/contracts')->with('success', 'contracte removido com sucesso');
    }
}
