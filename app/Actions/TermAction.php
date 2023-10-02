<?php

namespace App\Actions;

use App\Enums\StatusEnum;
use App\Models\Term;
use Carbon\Carbon;

class TermAction
{
    public function __invoke()
    {
        $month = Carbon::parse(now())->month;

        switch ($month) {
            case $month > 0 && $month <= 4:
                $term = 'second';
                break;

            case $month > 4 && $month <= 8;
                $term = 'third';
                break;

            case $month > 8 && $month <= 12;
                $term = 'first';
                break;
        }

        $isTerm = Term::where('name', $term)->exists();

        if (!$isTerm) {
            $activeTerm = Term::where('status', StatusEnum::ACTIVE->value)->first();
            $activeTerm && $activeTerm->update(['status' => StatusEnum::INACTIVE->value]);
            Term::create([
                'name' => $term,
                'status' => StatusEnum::ACTIVE->value
            ]);
            return;
        }
        $isCurrentTermActive = Term::where('status', StatusEnum::ACTIVE->value)->where('name', $term);
        if (!$isCurrentTermActive->exists()) {
            Term::where('status', StatusEnum::ACTIVE->value)->update(['status' => StatusEnum::INACTIVE->value]);
            Term::where('name', $term)->update(['status' => StatusEnum::ACTIVE->value]);
        }
    }
}

