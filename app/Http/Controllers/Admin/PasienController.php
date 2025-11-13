<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pasiens = User::where('role', 'pasien')->with('poli')->get();
        return view('admin.pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requestedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        User::create([
            'nama' => $requestedData['nama'],
            'alamat' => $requestedData['alamat'],
            'no_ktp' => $requestedData['no_ktp'],
            'no_hp' => $requestedData['no_hp'],
            'email' => $requestedData['email'],
            'password' => Hash::make($requestedData['password']),
            'role' => 'pasien',
        ]);
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil di tambahkan')->with('type', 'success');
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
    public function edit(User $pasien)
    {
        //
        return view('admin.pasien.edit',compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $pasien)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp,'.$pasien->id,
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|unique:users,email,'.$pasien->id,
            'password' => 'nullable|string|min:6',
        ]);
        $updateData = [
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_ktp' => $request['no_ktp'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
        ];
        if($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }
        $pasien->update($updateData);

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil di update')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pasien)
    {
        //
        $pasien->delete();
        return redirect()->route('pasien.index')->with('message', 'Pasien Berhasil di hapus !')->with('type', 'success');
    }
}
