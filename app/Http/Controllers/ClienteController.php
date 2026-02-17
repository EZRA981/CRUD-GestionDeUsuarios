<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /*El Controller basicamente es una herramienta de Laravel que me ayuda a tener una forma de redigir entre archivos
     uso distintas funciones, NOTA MENTAL PILAS CON LAS MINUSCULAS Y MAYUSCULAS EN LAS FUNCIONES*/


    /**
     * Display a listing of the resource.
     */
        public function index()
        {// 'c' minúscula
            return view('clientes.index', compact("clientes"));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('clientes.create'); //Redireccion hacia el archivo 
    }                                       //Se retorname la vista en la carpeta clientes el archivo create    

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $datosValidados = $request ->validate ([
            'nombre' => 'required|string|max:255',              //Le estoy diciendo a Laravel que valide/compruebe si los
            'email' => 'required|email|unique:clientes,email', // datos ingresados cumplen con los parametros asignados,
            'telefono' => 'required|string|max:255',           //en este apartado
            'empresa' => 'required|string|max:255',
            ]); 

                Cliente::create($datosValidados); //si es asi manda los datos mediante el metodo crear

                    return redirect()->route('clientes.index') //Nos direcciona a la pagina donde se ven los datos
                        ->with('success', 'Cliente creado correctamente');  //Mensaje de confirmacion des
        }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view ('clientes.show', compact('cliente')); /*Le pido a Laravel que me muestre el
                                                                                archivo show en el navegador, dicho archivo
                                                                                 tambien debe de mostrarme los datos 
                                                                                 almacenados en cliente*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $datosValidados = $request->validate([      
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes,email,' . $cliente->id, //Es lo mismo que el create, solo que estamos
        'telefono' => 'required|string|max:20'                             //diciendp que revise que el correo sea unico
    ]);                                                                    //ignora el el id del cliente y verifica que 
                                                                           // ese correo sea el unico en la db. 
        $cliente->update($datosValidados);

        return redirect()->route('clientes.index')
                        ->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete    ();
            return redirect()->route('clientes.index')->with(
                'success','Se ha borrado a un cliente de la base de datos');

        }
}
