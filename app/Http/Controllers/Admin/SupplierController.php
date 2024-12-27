<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);

        return view('pages.suppliers.index', [
            "suppliers" => $suppliers,
        ]);
    }

    public function create()
    {
        return view('pages.suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama_supplier" => "required",
            "alamat" => "required",
            "telepon" => "required",
        ]);

        Supplier::create($validated);

        return redirect('/suppliers');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('pages.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "nama_supplier" => "required",
            "alamat" => "required",
            "telepon" => "required",
        ]);

        Supplier::where('id', $id)->update($validated);

        return redirect('/suppliers');
    }

    public function delete($id)
    {
        Supplier::where('id', $id)->delete();

        return redirect('/suppliers');
    }
}
