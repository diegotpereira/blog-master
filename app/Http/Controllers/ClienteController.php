<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //
    public function add_cliente_form()
    {
        if (\View::exists('cliente.criar')) {
            # code...

            return view('cliente.criar');
        }
    }

    public function enviar_cliente_dado(Request $request)
    {
        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email|unique:clientes'
        ];

        $mensagemErros = [
            'required' => 'Por Favor seu :atribua primeiro.'
        ];

        Cliente::create([
            'nome' => $request->nome,
            'slug' => \Str::slug($request->nome),
            'email' => strtolower($request->email)
        ]);
        $this->mensagem('mensagem', 'Clinte cadastrado com sucesso!.');

        return redirect()->back();
    }
    public function buscar_todos_clientes()
    {
        $clientes =Cliente::toBase()->get();

        return view('cliente.editar', compact('cliente'));
    }

    public function editar_cliente_form_enviar(Request $request, Cliente $cliente)
    {
        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email|unique:clientes'
        ];
        $mensagemErros = [
            'required' => 'Entre seu :atribua primeiro.'
        ];

        $this->validate($request, $rules, $mensagemErros);

        $cliente->update([
            'nome' => $request->nome,
            'email' => strtolower($request->email)
        ]);

        $this->mensagem('mensagem', 'Cliente atualizado com sucesso!.');

        return redirect()->back();
    }
    public function mostrar_unico_cliente(Cliente $cliente)
    {
        return view('cliente.mostrar', compact('cliente'));
    }
    public function deletar_cliente(Cliente $cliente)
    {
        $cliente->deletar();
        $this->mensagem('mensagem', 'Cliente deletado com sucesso!.');

        return redirect()->back();
    }
    public function mensagem(string $nome =null, string $mensagem = null)
    {
        return session()->flash($nome, $mensagem);
    }
}
