<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $obat = Obat::where('tgl_kadaluarsa', '>', Carbon::now())->orderBy('created_at', 'desc')->get();
        return view('pages.obat', [
            'obats' => $obat,
        ]);
    }

    public function obatKadaluarsa()
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $obat = Obat::where('tgl_kadaluarsa', '<', Carbon::now())->get();
        return view('pages.components.obat.obatKadaluarsa', [
            'obats' => $obat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $supplier = Supplier::all();
        return view('pages.components.obat.addObat', [
            "suppliers" => $supplier
        ]);
    }

    public function store(Request $request)
    {
        $adminUsername = session()->get('admin_username');
        if (!$adminUsername) {
            return view('auth.login');
        }

        $obat = new Obat();
        $obat->fill($request->all());

        if ($request->hasFile('gambar_obat')) {
            $imageName = time() . '.' . $request->gambar_obat->extension();
            $request->gambar_obat->move(public_path('assets/img/obat'), $imageName);
            $obat->foto = $imageName;
        }

        $obat->save();

        return redirect('obat');
    }


    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode)
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $supplier = Supplier::all();
        $obat = Obat::where('kode', $kode)->first();
        // dd($obat);
        return view('pages.components.obat.editObat', [
            "suppliers" => $supplier,
            "obat" => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $obat = Obat::where('kode', $request->kode)->firstOrFail();
        $obat->fill($request->all());

        // Upload gambar ke dalam path public/assets/img/obat/
        if ($request->hasFile('gambar_obat')) {
            File::delete(public_path('assets/img/obat/' . $obat->foto));

            $imageName = time() . '.' . $request->gambar_obat->extension();
            $request->gambar_obat->move(public_path('assets/img/obat'), $imageName);
            $obat->foto = $imageName;
        }
        $obat->save();

        return redirect('obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $adminUsername = session()->get('admin_username');
        if (!$adminUsername)
            return view('auth.login');

        $obat = Obat::findOrFail($id);
        File::delete(public_path('assets/img/obat/' . $obat->foto));
        $obat->delete();

        return redirect('obat');
    }
}
