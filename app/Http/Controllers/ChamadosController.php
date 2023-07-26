<?php

namespace App\Http\Controllers;
use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class ChamadosController extends Controller
{
    public function indexTi()
    {
        $data['chamados_ti'] = Chamado::where('destinatario', 'T.I')->get();

        return view ('pages.home.indexTi', $data);
    }

    public function indexCompliance()
    {
        $data['chamados_compliance'] = Chamado::where('destinatario', 'Compliance')->get();

        return view ('pages.home.indexCompliance', $data);
    }

    public function create()
    {
        return view ('pages.home.create');
    }

    public function store(Request $request)
    {
        try {
            $values = $request->all();

            $values['formFile'] = Helper::uploadFiles($request, 'formFile', 'img_chamados', 'img_chamados');

            Chamado::create($values);

            return redirect()->back()->with('msg', 'Chamado criado com sucesso!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Algo de errado ocorreu com a operação, por favor, tente novamente.');
        }
    }

    public function show($id)
    {
        $chamado = Chamado::findOrFail($id);
        return view ('pages.home.show', [
            'chamado' => $chamado
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $chamado = Chamado::findOrFail($id);

            $chamado->update([
                'analista' => $request->analista,
                'prioridade' => $request->prioridade,
                'status' => $request->status,
                'andamento' => $request->andamento,
                'resolucao' => $request->resolucao,
                'email_analista' => $request->email_analista
            ]);

            return redirect()->back()->with('msg', 'Chamado editado com sucesso!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Algo de errado ocorreu com a operação, por favor, tente novamente.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamado->delete();

        return redirect()->back()->with('msg', 'Chamado finalizado com sucesso!');
    }

    public function acompanhamento()
    {
        $chamados = Chamado::where('solicitante', Auth::user()->nome)->withTrashed()->get();
        return view ('pages.home.acompanhamento', compact('chamados'));
    }

    public function acompanhamentoColaborador()
    {
        $chamados = Chamado::where('analista', Auth::user()->nome)->withTrashed()->get();
        return view ('pages.home.acompanhamentoTi', compact('chamados'));
    }

    public function editar_perfil(Request $request, $id)
    {
        $user = Auth::user($id);

        $user->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('msg', 'Usuário atualizado com sucesso!');
    }
}
