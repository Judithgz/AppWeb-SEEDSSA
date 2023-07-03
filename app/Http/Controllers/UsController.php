<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsController extends Controller
{

    public function index()
    {
        $us = User::us()->get();
        return view('us.index', compact('us'));
    }


    public function create()
    {
        return view('us.create');
    }

 
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del colaborador es obligatorio.',
            'name.min' => 'El nombre debe tener más de 3 carácteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa una dirección de correo electrónico valida.',
            'phone.required' => 'El numero de teléfono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        User::create(
        $request->only('name', 'email', 'phone')
        + [
            'role' => 'colaboradores',
            'password' => bcrypt($request->input('password'))
        ]
    );
    $notification = 'El colaborador se ha registrado correctamente.';
    return redirect('/nosotros')->with(compact('notification'));
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $colaboradores = User::us()->findOrFail($id);
        return view('us.edit', compact('colaboradores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del colaborador es obligatorio.',
            'name.min' => 'El nombre debe tener más de 3 carácteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa una dirección de correo electrónico valida.',
            'phone.required' => 'El numero de teléfono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);
        $user = User::us()->findOrFail($id);

        $data = $request->only('name', 'email', 'phone');
        $password = $request->input('password');

        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información se ha modificado correctamente.';
        return redirect('/nosotros')->with(compact('notification'));
    }


    public function destroy(string $id)
    {
        $user = User::us()->findOrFail($id);
        $colabName = $user->name;
        $user->delete();

        $notification = "El colaborador '. $colabName .' se elimino correctamente.";

        return redirect('/nosotros')->with(compact('notification'));
    }
}
