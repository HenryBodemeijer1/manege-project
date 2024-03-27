<?php

namespace App\Http\Controllers;

use App\Models\exam;
use App\Models\lessen;
use App\Models\LessenLeerling;
use App\Models\opmerkingen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessenController extends Controller
{

    private LessenFunctiesController $lessenFunctiesController;

    public function __construct(LessenFunctiesController $lessenFunctiesController)
    {
        $this->lessenFunctiesController = new LessenFunctiesController();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Lessen::all();
        $oneYearDate = date('Y-m-d', strtotime('+1 year'));
        $currentDate = date('Y-m-d');

        $date = $this->lessenFunctiesController->checkDate($request);

        foreach ($data as $les)
        {
            $this->lessenFunctiesController->validateLes($les);
        }

        $lessen = $this->lessenFunctiesController->lessenOpDate($data, $date);

        $dataLeerling = LessenLeerling::all()->where('user_id', Auth::id());

        $data = [];
        foreach ($dataLeerling as $les) {
            $data[] = lessen::find($les['lessen_id']);
        }

        foreach ($data as $les)
        {
            $this->lessenFunctiesController->validateLes($les);
        }

        $lessenLeerling = $this->lessenFunctiesController->lessenOpDate($data, $date);

        $examen = exam::all();

        $lessen = array_diff($lessen, $lessenLeerling);

        if (Auth()->user()->role == 'instructeur') {
            $lessenLeerling = lessen::all()->where('instructeur_id', Auth()->id());
        }

        return view('lessen/index', ['lessen' => $lessen, 'date' => $date, 'currentDate' => $currentDate, 'oneYearDate' => $oneYearDate, 'lessenLeerling' => $lessenLeerling, 'examen' => $examen]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructeurs = User::all()->where('role', 'instructeur');

        $oneYearDate = date('Y-m-d', strtotime('+1 year'));
        $currentDate = date('Y-m-d');

        return view('lessen/create', ['instructeurs' => $instructeurs, 'oneYearDate' => $oneYearDate, 'currentDate' => $currentDate]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $les = new lessen([
            'lesdoel' => $request->lesdoel,
            'onderwerp' => $request->onderwerp,
            'datetime' => $request->datetime,
            'instructeur_id' => $request->instructeur
        ]);

        $validationResult = $this->lessenFunctiesController->validateLes($les);

        if ($validationResult !== true) {
            // Redirect met foutmelding

            return redirect()->route('lessen.create')->with('niet gelukt', $validationResult);
        }

        $les->save();
        return redirect(route("lessen.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $les = lessen::find($id);

        $instructeur = User::find($les['instructeur_id']);

        $lessenLeerling = LessenLeerling::all()->where('lessen_id', $id);

        $leerlingen = [];
        foreach ($lessenLeerling as $lesLeerling) {
            $leerlingen[] = User::find($lesLeerling['user_id']);
        }

        $opmerkingen = opmerkingen::all()->where('lessen_id', $id);

        foreach ($opmerkingen as $opmerking) {
            $opmerking['naam'] = User::find($opmerking['user_id'])->naam;
        }

        $examen = exam::where('lessen_id', $id)->get()->toArray();

        if ($examen) {
            $examen = $examen[0];
        } else {
            $examen = null;
        }

        return view('lessen/show', ['les' => $les, 'instructeur' => $instructeur, 'leerlingen' => $leerlingen, 'opmerkingen' => $opmerkingen, 'examen' => $examen]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $les = lessen::find($id);

        $instructeurs = User::all()->where('role', 'instructeur');

        $oneYearDate = date('Y-m-d', strtotime('+1 year'));
        $currentDate = date('Y-m-d');

        return view('lessen/edit', ['les' => $les, 'instructeurs' => $instructeurs, 'oneYearDate' => $oneYearDate, 'currentDate' => $currentDate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $les = lessen::find($id);

       $les->lesdoel = $request->lesdoel;
       $les->onderwerp = $request->onderwerp;
       $les->datetime = $request->datetime;
       $les->instructeur_id = $request->instructeur;

        $validationResult = $this->lessenFunctiesController->validateLes($les);

        if ($validationResult !== true) {
            // Redirect met foutmelding
             return redirect()->route('lessen.edit', $id)->with('niet gelukt', $validationResult);
        }


        $les->save();
        return redirect(route("lessen.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $les = lessen::find($id);
        $les->delete();
        return redirect(route("lessen.index"));
    }
}
