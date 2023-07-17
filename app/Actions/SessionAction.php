<?php

namespace App\Actions;

use App\Enums\StatusEnum;
use App\Models\Session;
use Carbon\Carbon;

class SessionAction
{
    public function __invoke()
    {
        $month = Carbon::parse(now())->month;

        switch ($month) {
            case $month < 9 :
                $from = (date('Y') - 1);
                $to = date('Y');
                break;

            case $month > 8:
                $from = date('Y');
                $to = (date('Y') + 1);
                break;
        }

        $isSession = Session::where('from', $from)->where('to', $to)->exists();

        if (!$isSession) {
            $currentSession = Session::where('status', StatusEnum::ACTIVE->value)->first();
            $currentSession && $currentSession->update(['status' => StatusEnum::INACTIVE->value]);
            Session::create([
                'from' => $from,
                'to' => $to,
                'status' => StatusEnum::ACTIVE->value
            ]);
        }
    }
}

