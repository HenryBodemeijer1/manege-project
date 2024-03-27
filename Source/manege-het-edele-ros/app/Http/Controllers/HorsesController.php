<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorsesController extends Controller
{
    // Function to validate inputs for horses
    public function validateInputsHorses(Request $request){
        // Check if the 'naam' field is valid using the 'validateNaam' function
        if(
            $this->validateNaam($request->naam) 
        ){
            return true;// If 'naam' is valid, return true
        }
        return false;// If 'naam' is not valid, return false
    }

    // Function to validate the 'naam' (name) input
    public function validateNaam($naam){
        // Check if the length of 'naam' is greater than 2 characters
        if(strlen($naam) > 2){
            return true;// If 'naam' is valid, return true
        }
        return false;// If 'naam' is not valid, return false
    }
}
