<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\SalvagerJob;

class SalvagerController extends Controller
{
    public function __invoke()
    {
        SalvagerJob::dispatchNow();
    }
}
