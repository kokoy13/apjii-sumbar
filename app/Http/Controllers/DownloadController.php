<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk mengelola file

class DownloadController extends Controller
{
    /**
     * ==========================================
     * FRONTEND (Halaman Publik)
     * ==========================================
     */
    public function frontendIndex()
    {
        $downloads = Download::latest()->get(); 
        
        // Mengarahkan ke file blade frontend Anda
        return view('frontend.download', compact('downloads'));
    }

    /**
     * ==========================================
     * BACKEND (Panel Admin CRUD)
     * ==========================================
     */

    // 1. READ: Menampilkan daftar file di halaman Admin
    public function index()
    {
        $downloads = Download::latest()->get();
        return view('admin.downloads.index', compact('downloads'));
    }

    // 2. CREATE: Menampilkan form tambah dokumen
    public function create()
    {
        return view('admin.downloads.create');
    }

    // 3. STORE: Memproses data dari form tambah & upload file
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,zip,rar|max:10240', // Maks 10MB
        ]);

        $file = $request->file('document');

        // Kalkulasi ukuran file (konversi ke MB)
        $sizeInMb = round($file->getSize() / 1024 / 1024, 2);
        $sizeString = $sizeInMb > 0 ? $sizeInMb . ' MB' : round($file->getSize() / 1024, 2) . ' KB';

        // Simpan file ke folder storage/app/public/downloads
        $path = $file->store('downloads', 'public');

        // Simpan ke database
        Download::create([
            'title'     => $request->title,
            'category'  => $request->category,
            'extension' => strtolower($file->getClientOriginalExtension()),
            'size'      => $sizeString,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.downloads.index')
                         ->with('success', 'Dokumen berhasil diunggah.');
    }

    // 4. EDIT: Menampilkan form edit dokumen
    public function edit(Download $download)
    {
        return view('admin.downloads.edit', compact('download'));
    }

    // 5. UPDATE: Memproses update data (termasuk jika file diganti)
    public function update(Request $request, Download $download)
    {
        // Validasi input (dokumen opsional saat update)
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:10240',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => $request->category,
        ];

        // Jika admin mengunggah file baru, hapus yang lama & simpan yang baru
        if ($request->hasFile('document')) {
            // Hapus file fisik yang lama dari storage
            if (Storage::disk('public')->exists($download->file_path)) {
                Storage::disk('public')->delete($download->file_path);
            }

            // Simpan file baru
            $file = $request->file('document');
            $sizeInMb = round($file->getSize() / 1024 / 1024, 2);
            $sizeString = $sizeInMb > 0 ? $sizeInMb . ' MB' : round($file->getSize() / 1024, 2) . ' KB';

            $data['file_path'] = $file->store('downloads', 'public');
            $data['extension'] = strtolower($file->getClientOriginalExtension());
            $data['size']      = $sizeString;
        }

        // Update database
        $download->update($data);

        return redirect()->route('admin.downloads.index')
                         ->with('success', 'Dokumen berhasil diperbarui.');
    }

    // 6. DESTROY: Menghapus data dan file fisiknya
    public function destroy(Download $download)
    {
        // Hapus file fisik dari storage
        if (Storage::disk('public')->exists($download->file_path)) {
            Storage::disk('public')->delete($download->file_path);
        }

        // Hapus data dari database
        $download->delete();

        return redirect()->route('admin.downloads.index')
                         ->with('success', 'Dokumen berhasil dihapus.');
    }
}