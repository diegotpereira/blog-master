<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // add_customer_form
    public function add_cliente_form()
    {
        if (\View::exists('cliente.criar')) {
            # code...

            return view('cliente.criar');
        }
    }

    // submit_customer_data
    public function enviar_cliente_dado(Request $request)
    {
        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email|unique:clientes'
        ];

        $mensagemErros = [
            'required' => 'Enter your :attribute first.'
        ];

        $this->validate($request, $rules, $mensagemErros);

        Cliente::create([
            'nome' => $request->nome,
            'slug' => \Str::slug($request->nome),
            'email' => strtolower($request->email)
        ]);
        $this->mensagem('mensagem', 'Cliente cadastrado com sucesso!.');

        return redirect()->back();
    }
    // fetch_all_customer
    public function buscar_todos_clientes()
    {
        $clientes =Cliente::toBase()->get();

        return view('cliente.index', compact('clientes'));
    }
    //edit_customer_form
    public function editar_cliente_form(Cliente $cliente)
    {
        return view('cliente.editar', compact('cliente'));
    }
    // edit_customer_form_submit
    public function editar_cliente_form_enviar(Request $request, Cliente $cliente)
    {
        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email'
        ];
        $mensagemErros = [
            'required' => 'Enter your :attribute first.'
        ];

        $this->validate($request, $rules, $mensagemErros);

        $cliente->update([
            'nome' => $request->nome,
            'email' => strtolower($request->email)
        ]);

        $this->mensagem('mensagem', 'Cliente atualizado com sucesso!.');

        return redirect()->back();
    }
    // view_single_customer
    public function mostrar_unico_cliente(Cliente $cliente)
    {
        return view('cliente.mostrar', compact('cliente'));
    }

    // delete_customer
    public function deletar_cliente(Cliente $cliente)
    {
        $cliente->delete();
        $this->mensagem('mensagem', 'Cliente deletado com sucesso!.');

        return redirect()->back();
    }
    public function mensagem(string $nome =null, string $mensagem = null)
    {
        return session()->flash($nome, $mensagem);
    }
}
