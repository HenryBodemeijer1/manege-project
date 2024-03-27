<?php

namespace App\Http\Controllers;

use App\Models\User;

class LessenFunctiesController
{
    //Checkt of the user een 'date' heeft ingevuldt zo niet pak dan de date van vandaag
    public function checkDate($request)
    {
        if ($request->has('date'))
        {
            return $request->date;
        } else {
            return date('Y-m-d');
        }
    }

    //sanitize de data van de lesen
    public function lessenOpDate($data, $date)
    {
        $lessen = [];
        foreach ($data as $les)
        {
            $instructeur = $this->findInstructeur($les);

            $les['instructeur_id'] = $instructeur->naam;

            //explode date zodat je alleen het yaar, maand en dag overhoudt, en check dan of die gelijk staat aan 'date'
            $time_date = explode(" ", $les['datetime']);
            if ($time_date[0] == $date)
            {
                $lessen[] = $les;
            }
        }
        return $lessen;
    }

    //zoekt instructeur op
    public function findInstructeur($les)
    {
       return User::find($les['instructeur_id']);
    }

    public function validateLes($les)
    {
        $pattern = '/[^a-zA-Z0-9\s]/';

        // Controleer of lesdoel alleen letters en cijfers bevat
        if (preg_match($pattern, $les->lesdoel)) {
            $error = [
                'lesdoel' => $les->lesdoel
            ];
            $les = $this->fixValidatieError($pattern, ['lesdoel' => $les->lesdoel], $les);
            return ['message' => 'Lesdoel mag alleen bestaan uit woorden en letters!', 'data' => $les, 'error' => $error];
        }

        // Controleer of onderwerp alleen letters en cijfers bevat
        if (preg_match($pattern, $les->onderwerp)) {
            $error = [
                'onderwerp' => $les->onderwerp
            ];
            $les = $this->fixValidatieError($pattern, ['onderwerp' => $les->onderwerp], $les);
            return ['message' => 'Onderwerp mag alleen bestaan uit woorden en letters!', 'data' => $les, 'error' => $error];
        }

        // Controleer of er een instructeur is met het opgegeven id
        $instructeur = User::find($les->instructeur_id);
        if (!$instructeur) {
            return 'Kon instructeur met het opgegeven id niet vinden!';
        }

        // Controleer of de gebruiker de rol 'instructeur' heeft
        if ($instructeur->role !== 'instructeur') {
            return 'Aangegeven gebruiker heeft niet de rol instructeur!';
        }

        // Als alle controles slagen, retourneer true (geldig)
        return true;
    }

    public function fixValidatieError($pattern, $waarde, $les)
    {
        foreach ($waarde as $key => $value)
        {
            $model = $les;
            $model->$key = preg_replace($pattern, '', $value);
        }

        return $model;
    }
}
