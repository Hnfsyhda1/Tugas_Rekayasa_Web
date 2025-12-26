<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index()
    {
        $baseUrl = 'http://localhost:8080';
        $category = [];
        $response = Http::get($baseUrl . '/api/category');

        if ($response->successful()) {
            $body = $response->json();
            if (isset($body['data']) && is_array($body['data'])) {
                $category = $body['data'];
            }
        }

        return view('home.index', [
            'category' => $category,
        ]);

        
    }
    
    public function create()
    {
        return view('home.create');
    }

     public function store(Request $request)
    {
        $baseUrl = 'http://localhost:8080';

        $request->validate([
            'id' => ['required', 'regex:/^\S+$/'],
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $payload = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        $response = Http::post($baseUrl . '/api/category', $payload);

        if ($response->successful()) {
            $body = $response->json();
            $message = isset($body['message']) ? $body['message'] : 'Category created successfully';

            return redirect()->route('home.index')->with('success', $message);
        }

        return back()->withInput()->with('error', 'Gagal membuat category');
    }

    public function destroy(string $id)
    {
    $baseUrl = 'http://localhost:8080';

    $response = Http::delete($baseUrl . '/api/category/' . $id);

    if ($response->successful()) {
        return redirect()
            ->route('home.index')
            ->with('success', 'Category berhasil dihapus');
    }

    return redirect()
        ->route('home.index')
        ->with('error', 'Gagal menghapus category');
    }
}