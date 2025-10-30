<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'seminars' => Seminar::count(),
            'registrations' => Registration::count(),
            'users' => User::where('role', 'guest')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    // Seminar Management
    public function seminars()
    {
        $seminars = Seminar::latest()->get();
        return view('admin.seminars.index', compact('seminars'));
    }

    public function createSeminar()
    {
        return view('admin.seminars.create');
    }

    public function storeSeminar(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'zoom_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image'] = $imagePath;
        }

        Seminar::create($data);

        return redirect()->route('admin.seminars')->with('success', 'Seminar berhasil dibuat.');
    }

    public function editSeminar(Seminar $seminar)
    {
        return view('admin.seminars.edit', compact('seminar'));
    }

    public function updateSeminar(Request $request, Seminar $seminar)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'zoom_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($seminar->image) {
                Storage::disk('public')->delete($seminar->image);
            }
            
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image'] = $imagePath;
        }

        $seminar->update($data);

        return redirect()->route('admin.seminars')->with('success', 'Seminar berhasil diperbarui.');
    }

    public function destroySeminar(Seminar $seminar)
    {
        if ($seminar->image) {
            Storage::disk('public')->delete($seminar->image);
        }
        
        $seminar->delete();

        return redirect()->route('admin.seminars')->with('success', 'Seminar berhasil dihapus.');
    }

    // Registration Management
    public function registrations()
    {
        $registrations = Registration::with(['user', 'seminar'])->latest()->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function destroyRegistration(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    // About Management
    public function about()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::firstOrNew([]);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($about->photo) {
                Storage::disk('public')->delete($about->photo);
            }
            
            $photoPath = $request->file('photo')->store('uploads', 'public');
            $data['photo'] = $photoPath;
        }

        $about->fill($data);
        $about->save();

        return redirect()->route('admin.about')->with('success', 'Data about berhasil diperbarui.');
    }
}