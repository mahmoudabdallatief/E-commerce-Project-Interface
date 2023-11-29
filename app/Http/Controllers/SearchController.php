<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search_query'));
        $ignoredValue = DB::connection()->getPdo()->quote($search);

        if (empty($search) || $search === '') {
            // If the search query is empty or contains only spaces, redirect back to the previous page
            if ($request->headers->has('referer')) {
                return redirect()->back();
            } else {
                return redirect()->route('index'); // or any other default page
            }
        } else {
            $pagename = $search;
        }
        $products = DB::table('prro')
        ->join('cat', 'prro.cat', '=', 'cat.id')
        ->leftJoin('cat as parent_cat', 'cat.parent', '=', 'parent_cat.id')
        ->where(function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('prro.name', 'like', '%' . $search . '%')
                    ->orWhere('cat.cat', 'like', '%' . $search . '%');
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('cat.cat', '=', $search)
                    ->orWhere('prro.name', '=', $search);
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('parent_cat.cat', 'like', $search . '%');
            });
        })
        ->select('prro.id', 'prro.name', 'prro.cover', 'prro.date', 'prro.price', 'prro.offer')
        ->distinct()
        ->orderBy('prro.id')
        ->paginate(5);


        $num = count($products);

        return view('search', compact('products', 'pagename', 'num'));
    }

    public function searchresult(Request $request)
    {
        $search_query = trim($request->input('search_query'));

        if (empty($search_query)) {
            // If the search query is empty or contains only spaces, redirect back to the previous page
            return redirect()->back();
        }

        // Retrieve the search query
        $results = DB::select("
    SELECT prro.id, prro.name, cat.cat 
    FROM prro 
    JOIN cat ON prro.cat = cat.id 
    WHERE prro.name LIKE ? 
    OR cat.cat LIKE ? 
    OR cat.cat = ? 
    OR prro.name = ?
    UNION
    SELECT p.id, p.name, c.cat
    FROM prro p
    JOIN cat c ON p.cat = c.id
    WHERE c.cat IN (
        SELECT cat
        FROM cat
        WHERE cat LIKE ? 
        OR parent IN (
            SELECT id
            FROM cat
            WHERE cat = ? OR
            cat LIKE ?
        )
    )
    ORDER BY id ASC 
    LIMIT 5
", [
    "%$search_query%",
    "%$search_query%",
    $search_query,
    $search_query,
    "%$search_query%",
    $search_query,
    "%$search_query%"
]);

        // Return the results as a JSON-encoded array
        return response()->json($results);
    }
}
