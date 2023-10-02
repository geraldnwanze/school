<?php

namespace App\Actions;

use App\Models\SchoolFee;
use App\Models\Session;
use App\Models\Term;

class SchoolFeeAction
{
    public function __invoke()
    {
        $activeSession = Session::active();
        $activeTerm = Term::active();
        $activeSchoolFee = SchoolFee::where([
            'session_id' => $activeSession->id,
            'term_id' => $activeTerm->id
        ])->exists();

        if (!$activeSchoolFee) {
            switch ($activeTerm->name) {
                case 'first':
                    $previousTerm = 'third';
                    break;

                case 'second':
                    $previousTerm = 'first';
                    break;

                case 'third':
                    $previousTerm = 'second';
                    break;
            }
            $term = Term::where('name', $previousTerm)->first();
        }
    }
}

