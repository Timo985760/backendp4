<?php

namespace App\Http\Controllers;

use App\Models\AllergeenModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    protected AllergeenModel $allergeenModel;

    public function __construct(AllergeenModel $allergeenModel)
    {
        $this->allergeenModel = $allergeenModel;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('allergenen.index', [
            'title' => 'Allergenen',
            'allergenen' => $this->allergeenModel->getAllergenen(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('allergenen.create', [
            'title' => 'Allergeen toevoegen',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Naam' => ['required', 'string', 'max:50'],
            'Omschrijving' => ['required', 'string', 'max:255'],
        ], [
            'Naam.max' => 'De naam mag maximaal 50 karakters bevatten.',
        ]);

        DB::statement('CALL SP_CreateAllergeen(?, ?)', [
            $data['Naam'],
            $data['Omschrijving'],
        ]);

        return redirect()->route('allergeen.index')->with('success', 'Allergeen succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AllergeenModel $allergeenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allergeen = $this->allergeenModel->getAllergeenById($id);

        return view('allergenen.edit', [
            'title' => 'Allergeen wijzigen',
            'allergeen' => $allergeen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Naam' => ['required', 'string', 'max:50'],
            'Omschrijving' => ['required', 'string', 'max:255'],
        ], [
            'Naam.max' => 'De naam mag maximaal 50 karakters bevatten.',
        ]);

        DB::statement('CALL SP_UpdateAllergeen(?, ?, ?)', [
            $id,
            $data['Naam'],
            $data['Omschrijving'],
        ]);

        return redirect()->route('allergeen.index')->with('success', 'Allergeen succesvol aangepast.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement('CALL SP_DeleteAllergeen(?)', [$id]);

        return redirect()->route('allergeen.index')->with('success', 'Allergeen succesvol verwijderd.');
    }
}
