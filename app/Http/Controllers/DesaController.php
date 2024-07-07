<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DesaController extends Controller
{
    public function index()
    {
        return Desa::all();
    }

    public function show($id)
    {
        return Desa::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:desas|max:255'
        ]);

        return Desa::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                Rule::unique('desas')->ignore($desa->id),
                'max:255'
            ]
        ]);

        $desa->update($request->all());

        return $desa;
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return response()->json(['message' => 'Data sudah terhapus'], 200);
    }
}
