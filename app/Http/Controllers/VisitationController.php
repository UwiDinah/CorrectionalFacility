<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitationController extends Controller
{


        /**
    * @OA\Get(
    *      path="/api/visitation",
    *      operationId="visit",
    *      tags={"User Route"},
    *       summary="Summaries",
    *      description="AdminDescription",
    *      @OA\Response(
    *          response=200,
    *          description="Successfully retreived the data",
    *       ),
    *     )
    */
    public function scheduleVisit(Request $request)
{
    $visitor = new Visitor;
    $visitor->name = $request->input('name');
    $visitor->email = $request->input('email');
    $visitor->visitation_day = $request->input('visitation_day');

    // Check if the selected day is Tuesday or Thursday
    if (date('D', strtotime($visitor->visitation_day)) == 'Tue' || date('D', strtotime($visitor->visitation_day)) == 'Thu') {
        $visitor->visitation_status = 'disallowed';
    } else {
        $visitor->visitation_status = 'allowed';
    }

    $visitor->save();

    return redirect('/visitation-status/' . $visitor->id);
}
}
