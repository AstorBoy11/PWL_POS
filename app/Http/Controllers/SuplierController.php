<?php

namespace App\Http\Controllers;

use App\Models\SuplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Suplier',
            'list' => ['Home', 'Suplier']
        ];

        $page = (object) [
            'title' => 'Daftar suplier dalam sistem'
        ];

        $activeMenu = 'suplier';

        $suplier = SuplierModel::select('suplier_id', 'nama_suplier', 'kontak', 'alamat')->distinct()->get();

        return view('suplier.index', compact('breadcrumb', 'page', 'activeMenu', 'suplier'));
    }

    public function list(Request $request)
    {
        $suplier = SuplierModel::select('suplier_id', 'nama_suplier', 'kontak', 'alamat', 'created_at', 'updated_at');

        if (!empty($request->nama_suplier)) {
            $suplier->where('nama_suplier', 'like', "%{$request->nama_suplier}%");
        }

        return DataTables::of($suplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($suplier) {
                $btn = '<a href="' . url('/suplier/' . $suplier->suplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/suplier/' . $suplier->suplier_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/suplier/' . $suplier->suplier_id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button>'
                    . '</form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Suplier',
            'list' => ['Home', 'Suplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah suplier baru'
        ];

        $activeMenu = 'suplier';

        return view('suplier.suplierCreate', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string|max:255'
        ]);

        SuplierModel::create($request->only('nama_suplier', 'kontak', 'alamat'));

        return redirect('/suplier')->with('success', 'Data suplier berhasil disimpan');
    }

    public function show($suplier_id)
    {
        $suplier = SuplierModel::find($suplier_id);

        if (!$suplier) {
            return redirect('/suplier')->with('error', 'Data suplier tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Suplier',
            'list' => ['Home', 'Suplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail suplier'
        ];

        $activeMenu = 'suplier';

        return view('suplier.suplierShow', compact('suplier', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function edit($suplier_id)
    {
        $suplier = SuplierModel::find($suplier_id);

        if (!$suplier) {
            return redirect('/suplier')->with('error', 'Data suplier tidak ditemukan.');
        }

        return view('suplier.suplierEdit', [
            'breadcrumb' => (object) ['title' => 'Edit Suplier', 'list' => ['Home', 'Suplier', 'Edit']],
            'page' => (object) ['title' => 'Edit Suplier'],
            'suplier' => $suplier,
            'activeMenu' => 'suplier'
        ]);
    }

    public function update(Request $request, $suplier_id)
    {
        $request->validate([
            'nama_suplier' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string|max:255'
        ]);

        $suplier = SuplierModel::find($suplier_id);
        if (!$suplier) {
            return redirect('/suplier')->with('error', 'Data suplier tidak ditemukan.');
        }

        $suplier->update($request->only('nama_suplier', 'kontak', 'alamat'));

        return redirect('/suplier')->with('success', 'Data suplier berhasil diubah');
    }

    public function destroy($suplier_id)
    {
        $suplier = SuplierModel::find($suplier_id);
        if (!$suplier) {
            return redirect('/suplier')->with('error', 'Data suplier tidak ditemukan');
        }

        try {
            $suplier->delete();
            return redirect('/suplier')->with('success', 'Data suplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/suplier')->with('error', 'Data suplier sedang digunakan');
        }
    }
}