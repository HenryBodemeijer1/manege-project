<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;

class HorsesResourceController extends HorsesController
{
    
    public function index()
    {
        // Haal paarden op uit de database, gesorteerd op ID in aflopende volgorde en pagineer ze met 10 per pagina
        $paarden = Horse::orderBy("id", "DESC")->paginate(10);
        // Geef de lijst met paarden door aan de 'index'-weergave
        return view('manage_paarden.index')->with('paarden', $paarden);
    }

    public function create()
    {
        // Toon het formulier voor het toevoegen van een nieuw paard
        return view('manage_paarden.create');
    }

    public function store(Request $request)
    {
        // Valideer de invoergegevens voor paarden
        if ($this->validateInputsHorses($request)) {
            // Maak een nieuw paard aan met de gegevens van het verzoek
            $paarden = Horse::create($request->all());
            
            // Redirect naar de lijst met paarden
            return redirect()->route("Horses"); 
        }
        // Als de validatie mislukt, keer dan terug met een foutmelding
        return redirect()->back()->with('message', 'Niet genoeg karakters gebruik meer dan 2');
    }

    public function show($id)
    {
        // Haal een specifiek paard op op basis van ID en toon de details
        $paarden = Horse::find($id);
        return view('manage_paarden.show')->with('paarden', $paarden);
    }

    public function edit($id)
    {
        // Haal een specifiek paard op op basis van ID en toon het bewerkingsformulier
        $paarden = Horse::find($id);
        return view('manage_paarden.edit')->with('paarden', $paarden);
    }

    public function update(Request $request)
    {
        // Haal een specifiek paard op op basis van ID
        $paarden = Horse::find($request->id);

        // Valideer de invoergegevens voor paarden
        if ($this->validateInputsHorses($request)) {
            // Update de paardgegevens met de gegevens van het verzoek
            $paarden->update($request->all());
            
            // Redirect naar de lijst met paarden
            return redirect()->route("Horses"); 
        }
        // Als de validatie mislukt, keer dan terug met een foutmelding
        return redirect()->back()->with('message', 'Niet genoeg karakters gebruik meer dan 2');
    }

    public function destroy($id)
    {
        // Verwijder een specifiek paard op basis van ID
        Horse::destroy($id);
        // Redirect naar de lijst met paarden
        return redirect()->route("Horses");  
    }
}
