<?php

namespace App\Http\Controllers;

use App\Requests\InnForm;
use App\Services\InnChecker;
use Illuminate\Contracts\View\View;

class InnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InnForm $request
     * @param InnChecker $innChecker
     * @return View
     */
    public function store(InnForm $request, InnChecker $innChecker): View
    {
        $validated = $request->validated();
        $data = $innChecker->check($validated['inn']);

        return view('home.index', compact('data'));
    }
}
