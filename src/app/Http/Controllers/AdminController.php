<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dataAdmin = User::where('role', 'admin')->count(); 
        $dataUser = User::where('role', 'user')->count();
        return view('admin.page.dashboard', [
            'name'          => "Dashboard",
            'title'         => 'Admin Dashboard',
            'totalUser'  => $dataUser,
            'totalAdmin' => $dataAdmin,
        ]);
    }

    public function user(Request $request)
    {
        $query = User::where('role', 'user'); 

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('tlp', 'LIKE', '%' . $search . '%')
                    ->orWhere('jenis_kelamin', 'LIKE', '%' . $search . '%')
                    ->orWhere('tipe', 'LIKE', '%' . $search . '%');
            });
        }

        $data = $query->paginate($request->has('search') ? $query->count() : 4);

        return view('admin.page.user', [
            'name'  =>  'User Management',
            'title' => 'Admin User Management',
            'data'  => $data,
        ]);
    }

    public function payment(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('tlp', 'LIKE', '%' . $search . '%')
                    ->orWhere('jenis_kelamin', 'LIKE', '%' . $search . '%')
                    ->orWhere('tipe', 'LIKE', '%' . $search . '%');
            });
        }

        $data = $query->paginate($request->has('search') ? $query->count() : 4);

        return view('admin.page.payment', [
            'name'  =>  'Payment Details',
            'title' => 'Payment Details',
            'data'  => $data,
        ]);
    }
    
    public function admin(Request $request)
    {
        $query = User::where('role', 'admin'); 

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('tlp', 'LIKE', '%' . $search . '%')
                    ->orWhere('jenis_kelamin', 'LIKE', '%' . $search . '%')
                    ->orWhere('tipe', 'LIKE', '%' . $search . '%');
            });
        }

        $data = $query->paginate($request->has('search') ? $query->count() : 4);

        return view('admin.page.admin', [
            'name'  =>  'Admin Management',
            'title' => 'Admin Management',
            'data'  => $data,
        ]);
    }

    public function addModalAdmin()
    {
        return view('admin.modal.addAdmin', [
            'title' => 'Tambah Data Admin',
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.addUser', [
            'title' => 'Tambah Data Member',
        ]);
    }

    public function showUser($id)
    {
        $data = User::findOrFail($id);
        return view(
            'admin.modal.editUser',
            [
                'title' => 'Edit Data User',
                'data'  => $data,
            ]
        )->render();
    }

    public function showAdmin($id)
    {
        $data = User::findOrFail($id);
        return view(
            'admin.modal.editAdmin',
            [
                'title' => 'Edit Data Admin',
                'data'  => $data,
            ]
        )->render();
    }

    // public function showPayment($id)
    // {
    //     $data = User::findOrFail($id);
    //     return view(
    //         'admin.modal.paymentUser',
    //         [
    //             'title' => 'Data Transaksi',
    //             'data'  => $data,
    //         ]
    //     )->render();
    // }

    public function showPayment($id)
    {
        $data = User::findOrFail($id);
        $directory = public_path('storage/bukti-pembayaran');
        $files = File::files($directory);
        $username = str_replace(' ', '_', $data->name);
        $matchedFiles = [];
        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if (strpos($filename, $username) !== false) {
                $matchedFiles[] = $file;
            }
        }

        $now = Carbon::now('Asia/Jakarta');
        $tanggal = $now->format('d-m-Y');
        $jam = $now->format('H:i:s');

        return view('admin.modal.paymentUser', [
            'title' => 'Data Transaksi',
            'matchedFiles' => $matchedFiles,
            'name' => $data->name,
            'tanggal' => $tanggal,
            'jam' => $jam,
        ]);
    }

    public function addUser(UserRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tahun_kelahiran' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
            'tipe' => 'required',
        ]);

        $data = new User;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tlp = $request->tlp;
        $data->tahun_kelahiran = $request->tahun_kelahiran;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->role = 'user';
        $data->tipe = $request->tipe;
        $data->payment_date = $request->payment_date;
        $data->expired_date = $request->expired_date;
        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $filename = date('Ymd') . '_' . str_replace(' ', '_', $data->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }
        $data->save();

        return back()->with('success', 'Berhasil menambah data member');
    }

    public function addAdmin(UserRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tahun_kelahiran' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
            'tipe' => 'required',
        ]);

        $data = new User;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tlp = $request->tlp;
        $data->tahun_kelahiran = $request->tahun_kelahiran;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->role = 'admin';
        $data->tipe = $request->tipe;
        $data->payment_date = $request->payment_date;
        $data->expired_date = $request->expired_date;

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }
        $data->save();

        return back()->with('success', 'Berhasil menambah data admin');
    }

    public function userUpdate(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'tahun_kelahiran' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
            'tipe' => 'required',
        ]);

        if (!$request->filled('password')) {
            $data->fill($request->except('password'));
        } else {
            $data->fill($request->all());
        }

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $filename = date('Ymd') . '_' . str_replace(' ', '_', $data->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }

        $data->name = $request->nama;
        $data->email = $request->email;
        $data->tlp = $request->tlp;
        $data->tahun_kelahiran = $request->tahun_kelahiran;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->role = 'user';
        $data->tipe = $request->tipe;
        $data->payment_date = $request->payment_date;
        $data->expired_date = $request->expired_date;
        $data->save();

        return back()->with('success', 'Berhasil mengedit user');
    }

    public function updateAdmin(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'tahun_kelahiran' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
        ]);

        if (!$request->filled('password')) {
            $data->fill($request->except('password'));
        } else {
            $data->fill($request->all());
        }

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }

        $data->name = $request->nama;
        $data->email = $request->email;
        $data->tlp = $request->tlp;
        $data->tahun_kelahiran = $request->tahun_kelahiran;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tlp = $request->tlp;
        $data->role = 'admin';
        $data->tipe = 'Guest';
        $data->payment_date = $request->payment_date;
        $data->expired_date = $request->expired_date;
        $data->save();

        return back()->with('success', 'Berhasil mengedit user');
    }

    public function userDestroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect()->route('product');
    }

    public function adminDestroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect()->route('product');
    }

}
