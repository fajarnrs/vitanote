<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use App\Models\VitaminCategory;
use Illuminate\Http\Request;

class VitaminController extends Controller
{
    /**
     * Display a listing of all vitamins.
     */
    public function index(Request $request)
    {
        // Letters filter (e.g., ?letters[]=A&letters[]=B)
        $selectedLetters = collect((array) $request->input('letters', []))
            ->map(fn ($l) => strtoupper(substr((string) $l, 0, 1)))
            ->filter(fn ($l) => preg_match('/^[A-Z]$/', $l))
            ->values();

        // Free-text search (e.g., ?q=biotin)
        $q = trim((string) $request->input('q', ''));

        $vitamins = null;

        if ($selectedLetters->isNotEmpty() || $q !== '') {
            $vitamins = Vitamin::query()
                ->when($selectedLetters->isNotEmpty(), function ($query) use ($selectedLetters) {
                    $query->where(function ($q2) use ($selectedLetters) {
                        foreach ($selectedLetters as $letter) {
                            $q2->orWhere('name', 'like', $letter . '%');
                        }
                    });
                })
                ->when($q !== '', function ($query) use ($q) {
                    $query->where(function ($q2) use ($q) {
                        $q2->where('name', 'like', "%{$q}%")
                            ->orWhere('alternative_name', 'like', "%{$q}%");
                    });
                })
                ->orderBy('name')
                ->paginate(30)
                ->withQueryString();
        }

        $categories = VitaminCategory::with(['vitamins' => function ($query) {
            $query->orderBy('order')->orderBy('name');
        }])->get();

        // Only show vitamin letters: A, D, E, K, B, C
        $letters = ['A', 'D', 'E', 'K', 'B', 'C'];

        return view('vitamins.index', [
            'categories' => $categories,
            'vitamins' => $vitamins,
            'letters' => $letters,
            'selectedLetters' => $selectedLetters,
            'q' => $q,
        ]);
    }

    /**
     * Display vitamins by category.
     */
    public function category($slug)
    {
        $category = VitaminCategory::where('slug', $slug)
            ->with(['vitamins' => function ($query) {
                $query->orderBy('order')->orderBy('name');
            }])
            ->firstOrFail();

        return view('vitamins.category', compact('category'));
    }

    /**
     * Display the specified vitamin.
     */
    public function show($slug)
    {
        $vitamin = Vitamin::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        // Get related vitamins from same category
        $relatedVitamins = Vitamin::where('category_id', $vitamin->category_id)
            ->where('id', '!=', $vitamin->id)
            ->orderBy('order')
            ->limit(4)
            ->get();

        return view('vitamins.show', compact('vitamin', 'relatedVitamins'));
    }
}
