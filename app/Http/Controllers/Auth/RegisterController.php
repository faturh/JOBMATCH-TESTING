<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan formulir registrasi
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Menangani pengiriman formulir registrasi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi data dari formulir
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:employee,company',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',  // Validasi foto
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',  // Validasi CV
            'portfolio' => 'nullable|mimes:pdf,doc,docx,zip|max:2048',  // Validasi portofolio
        ]);

        // Menyiapkan data untuk pengguna baru
        $data = $request->only('name', 'email', 'password', 'role','photo', 'cv', 'portfolio');
        $data['password'] = Hash::make($request->password); // Enkripsi password

        try {
            // Menyimpan pengguna baru di tabel 'users'
            $user = User::create($data);

            // Menyimpan data applicant jika role adalah 'employee'
            if ($request->role === 'applicant') {
                $user->applicant()->create([
                    'photo' => $request->file('photo') ? $request->file('photo')->store('photos') : null,
                    'cv_file' => $request->file('cv') ? $request->file('cv')->store('cvs') : null,
                    'portfolio_file' => $request->file('portfolio') ? $request->file('portfolio')->store('portfolios') : null,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'desired_position' => $request->desired_position,
                    'type_of_work' => $request->type_of_work,
                    'location' => $request->location,
                    'salary_min' => $request->salary_min,
                    'salary_max' => $request->salary_max,
                    'availability_date' => $request->availability_date,
                    'available_now' => $request->available_now,
                    'institution' => $request->institution,
                    'major' => $request->major,
                    'graduation_year' => $request->graduation_year,
                    'work_company' => $request->work_company,
                    'work_position' => $request->work_position,
                    'work_description' => $request->work_description,
                    'soft_skills' => $request->soft_skills,
                    'hard_skills' => $request->hard_skills,
                    'certification' => $request->certification,
                ]);
            }

            // Menambahkan pesan flash ke session untuk menandakan berhasil
            session()->flash('success', 'Registrasi berhasil! Silakan login.');

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login');
            
        } catch (\Exception $e) {
            // Menambahkan pesan error jika terjadi kesalahan saat menyimpan
            session()->flash('error', 'Terjadi kesalahan saat registrasi: ' . $e->getMessage());
            return back();
        }
    }
}
