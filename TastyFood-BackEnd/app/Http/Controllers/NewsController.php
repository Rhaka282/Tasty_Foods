<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * API: Get all news (ordered by latest)
     */
    public function apiIndex(Request $request)
    {
        $limit = $request->query('limit');
        $query = News::latest();

        if ($limit) {
            $query->limit(intval($limit));
        }

        $news = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'slug' => $item->slug,
                'content' => $item->content,
                'image' => $item->image,
                'image_url' => $this->resolveImageUrl($item->image),
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return response()->json($news);
    }

    /**
     * API: Get single news details
     */
    public function apiShow($idOrSlug)
    {
        $news = News::where('id', $idOrSlug)
            ->orWhere('slug', $idOrSlug)
            ->first();

        if (!$news) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $news->id,
            'title' => $news->title,
            'slug' => $news->slug,
            'content' => $news->content,
            'image' => $news->image,
            'image_url' => $this->resolveImageUrl($news->image),
            'created_at' => $news->created_at,
            'updated_at' => $news->updated_at,
        ]);
    }

    /**
     * Helper to resolve full image URL
     */
    private function resolveImageUrl($path)
    {
        if (!$path) {
            return asset('images/default-news.jpg');
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (str_starts_with($path, 'ASET/')) {
            // Seeded frontend assets - returned as-is for frontend to render from its own folder
            return $path;
        }
        return asset('storage/' . $path);
    }

    /* ----------------------------------------------------
     * ADMIN PANEL WEB METHODS
     * ---------------------------------------------------- */

    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(1000, 9999),
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            // Delete old image if it exists and is not a seed asset
            if ($news->image && !str_starts_with($news->image, 'ASET/')) {
                Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(1000, 9999),
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->image && !str_starts_with($news->image, 'ASET/')) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
