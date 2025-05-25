<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class GymController extends Controller
{
    public function index(Request $request)
    {
        return view('pelanggan.page.home', [
            'title' => 'Home',
        ]);
    }

    public function register(Request $request)
    {
        return view('pelanggan.login.register', [
            'title' => 'Register',
        ]);
    }

    public function artikel1(Request $request)
    {
        return view('pelanggan.page.artikel1');
    }

    public function artikel2(Request $request)
    {
        return view('pelanggan.page.artikel2');
    }

    public function artikel3(Request $request)
    {
        return view('pelanggan.page.artikel3');
    }

    public function login(Request $request)
    {
        return view('pelanggan.login.login', [
            'title' => 'Login',
        ]);
    }


    public function membership($id)
    {
        $data = User::findOrFail($id);
        return view(
            'pelanggan.page.membership',
            [
                'title' => 'Membership',
                'data'  => $data,
            ]
        )->render();
    }

    public function pemula($id)
    {
        $data = User::findOrFail($id);
        return view(
            'pelanggan.page.pemula',
            [
                'title' => 'Paket Pemula',
                'data'  => $data,
            ]
        )->render();
    }

    public function menengah($id)
    {
        $data = User::findOrFail($id);
        return view(
            'pelanggan.page.menengah',
            [
                'title' => 'Paket Menengah',
                'data'  => $data,
            ]
        )->render();
    }

    public function calonAtlet($id)
    {
        $data = User::findOrFail($id);
        return view(
            'pelanggan.page.calonAtlet',
            [
                'title' => 'Paket Calon Atlet',
                'data'  => $data,
            ]
        )->render();
    }

    public function processPemula(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $request->validate([
            'bank' => 'required',
            'bukti' => 'required',
        ]);

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $timestamp = Carbon::now()->setTimezone('Asia/Jakarta')->format('Ymd_His');
            $filename = $timestamp . '_' . str_replace(' ', '_', $data->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }

        $data->tipe = 'Pemula';

        if (!$data->payment_date && !$data->expired_date) {
            $data->payment_date = Carbon::now()->subMonth();
            $data->expired_date = Carbon::now()->addMonth()->subMonth();
        } else {
            if ($data->expired_date && Carbon::parse($data->expired_date)->isFuture()) {
                $data->expired_date = Carbon::parse($data->expired_date)->addMonth();
            } else {
                $data->expired_date = Carbon::now()->addMonth();
            }
        }

        $data->bank = $request->bank;
        $data->save();

        return redirect('/')->with('success', 'Operasi Berhasil');
    }

    public function processMenengah(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);
        
        $request->validate([
            'bank' => 'required',
            'bukti' => 'required',
        ]);

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $timestamp = Carbon::now()->setTimezone('Asia/Jakarta')->format('Ymd_His');
            $filename = $timestamp . '_' . str_replace(' ', '_', $data->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }

        $data->tipe = 'Menengah';

        if (!$data->payment_date && !$data->expired_date) {
            $data->payment_date = Carbon::now()->subMonth();
            $data->expired_date = Carbon::now()->addMonth()->subMonth();
        } else {
            if ($data->expired_date && Carbon::parse($data->expired_date)->isFuture()) {
                $data->expired_date = Carbon::parse($data->expired_date)->addMonth();
            } else {
                $data->expired_date = Carbon::now()->addMonth();
            }
        }

        $data->bank = $request->bank;
        $data->save();

        return redirect('/')->with('success', 'Operasi Berhasil');
    }


    public function processCalonAtlet(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $request->validate([
            'bank' => 'required',
            'bukti' => 'required',
        ]);

        if ($request->hasFile('bukti')) {
            $photo = $request->file('bukti');
            $timestamp = Carbon::now()->setTimezone('Asia/Jakarta')->format('Ymd_His');
            $filename = $timestamp . '_' . str_replace(' ', '_', $data->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/bukti-pembayaran'), $filename);
            $data->bukti = $filename;
        }

        $data->tipe = 'Calon Atlet';

        if (!$data->payment_date && !$data->expired_date) {
            $data->payment_date = Carbon::now()->subMonth();
            $data->expired_date = Carbon::now()->addMonths(3)->subMonth();
        } else {
            if ($data->expired_date && Carbon::parse($data->expired_date)->isFuture()) {
                $data->expired_date = Carbon::parse($data->expired_date)->addMonths(3);
            } else {
                $data->expired_date = Carbon::now()->addMonths(3);
            }
        }

        $data->bank = $request->bank;
        $data->save();

        return redirect('/')->with('success', 'Operasi Berhasil');
    }

    public function storePelanggan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tahun_kelahiran' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required',
        ], [
            'name.required' => 'Silahkan isi nama user.',
            'email.required' => 'Silahkan isi alamat email.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Silahkan isi password.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'tahun_kelahiran.required' => 'Silahkan isi tahun_kelahiran.',
            'jenis_kelamin.required' => 'Silahkan pilih jenis kelamin user.',
            'tlp.required' => 'Silahkan isi nomor telepon.',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->tahun_kelahiran = $request->tahun_kelahiran;
        $data->tlp = $request->tlp;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->role = 'user';
        $data->tipe = 'Guest';
        $data->save();

        event(new Registered($data));

        return redirect('/')->with('success', 'Berhasil Membuat Akun');
    }

    public function loginProses(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if (!$proses || $proses->email === 0) {
            return back()->with('errors', 'Email atau password tidak valid');
        }

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Berhasil Login');
        } else {
            return back()->with('errors', 'Email atau password tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');                       
    }
}
