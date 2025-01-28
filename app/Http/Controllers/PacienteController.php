<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf; // Import correto para versão >= 2.x / 3.x
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Lista os pacientes com busca e paginação
     */
    public function index(Request $request)
    {
        // Captura o termo de busca
        $search = $request->input('search');

        // Inicia a query
        $query = Paciente::query();

        // Se houver termo de busca, filtra por nome OU e-mail
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', '%' . $search . '%')
                  ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        // Paginação (10 resultados por página)
        $pacientes = $query->paginate(10);

        // Retorna a view de listagem
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Mostra o formulário de criação de um novo paciente
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Salva um novo paciente no banco
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'             => 'required|string|max:255',
            'data_nascimento'  => 'required|date',
            'email'            => 'nullable|email|unique:pacientes,email',
            'telefone'         => 'nullable|string|max:20',
            'endereco'         => 'nullable|string',
        ]);

        Paciente::create($validated);

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente criado com sucesso.');
    }

    /**
     * Exibe os detalhes de um paciente
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Mostra o formulário de edição de um paciente
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Atualiza as informações do paciente
     */
    public function update(Request $request, Paciente $paciente)
    {
        $validated = $request->validate([
            'nome'             => 'required|string|max:255',
            'data_nascimento'  => 'required|date',
            'email'            => 'nullable|email|unique:pacientes,email,' . $paciente->id,
            'telefone'         => 'nullable|string|max:20',
            'endereco'         => 'nullable|string',
        ]);

        $paciente->update($validated);

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso.');
    }

    /**
     * Remove um paciente do banco
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente removido com sucesso.');
    }

    /**
     * Exporta os dados dos pacientes em PDF ou CSV
     */
    public function export($type)
    {
        // Busca todos os pacientes (ou aplique filtros conforme necessidade)
        $pacientes = Paciente::all();

        if ($type === 'pdf') {
            // Renderiza a view "pacientes.export_pdf" (crie essa view com layout básico)
            $pdf = Pdf::loadView('pacientes.export_pdf', compact('pacientes'));

            // Retorna o download do arquivo "pacientes.pdf"
            return $pdf->download('pacientes.pdf');

        } elseif ($type === 'csv') {
            // Gera CSV manualmente
            $filename = 'pacientes.csv';

            // Abre um arquivo temporário
            $handle = fopen($filename, 'w+');
            // Cabeçalho do CSV
            fputcsv($handle, ['ID', 'Nome', 'Data de Nascimento', 'Email']);

            // Insere dados de cada paciente
            foreach ($pacientes as $paciente) {
                fputcsv($handle, [
                    $paciente->id,
                    $paciente->nome,
                    $paciente->data_nascimento,
                    $paciente->email,
                ]);
            }

            fclose($handle);

            // Faz o download e apaga o arquivo temporário após enviar
            return response()->download($filename, $filename, [
                'Content-Type'        => 'text/csv',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            ])->deleteFileAfterSend(true);

        } else {
            // Se não for pdf nem csv, redireciona
            return redirect()
                ->route('pacientes.index')
                ->with('error', 'Tipo de exportação inválido!');
        }
    }
}
