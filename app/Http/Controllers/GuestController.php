<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Seminar;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function dashboard()
    {
        $seminars = Seminar::where('date', '>', now())->latest()->get();
        return view('guest.dashboard', compact('seminars'));
    }

    public function showSeminar(Seminar $seminar)
    {
        $isRegistered = Registration::where('user_id', auth()->id())
            ->where('seminar_id', $seminar->id)
            ->exists();

        return view('guest.seminar-detail', compact('seminar', 'isRegistered'));
    }

    public function registerSeminar(Request $request, Seminar $seminar)
    {
        $request->validate([
            'note' => 'nullable|string|max:500',
        ]);

        // Check if already registered
        $existingRegistration = Registration::where('user_id', auth()->id())
            ->where('seminar_id', $seminar->id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di seminar ini.');
        }

        Registration::create([
            'user_id' => auth()->id(),
            'seminar_id' => $seminar->id,
            'note' => $request->note,
        ]);

        return redirect()->route('guest.dashboard')->with('success', 'Pendaftaran seminar berhasil!');
    }

    public function myRegistrations()
    {
        $registrations = Registration::with('seminar')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('guest.my-registrations', compact('registrations'));
    }
}