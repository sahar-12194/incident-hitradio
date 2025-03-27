<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentRequest;
use App\Models\Entity;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::orderBy('created_at', 'DESC')
            ->get();

        return view('Incident.list')
            ->with('incidents', $incidents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entities = Entity::orderBy('created_at', 'DESC')
            ->get();
        return view('Incident.create')
            ->with('entities', $entities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {

        $incident = Incident::create([
            'heure_started' => $request->heure_started,
            'heure_end' => $request->heure_end,
            'type_panne' => $request->type_panne,
            'action' => $request->action,
            'inpact' => $request->inpact,
            'obsevation' => $request->obsevation,
            'status' => $request->status,
            'entity_id' => $request->entity_id,
            'user_id' =>  Auth::user()->id,
        ]);
        return redirect(route('incident.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        //return view('Incident.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        $entities = Entity::orderBy('created_at', 'DESC')
            ->get();
        $incident = Incident::where('id', $incident->id)->first();

        //dd($incident);
        return view('Incident.create')
            ->with('incident', $incident)
            ->with('entities', $entities);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentRequest $request, Incident $incident)
    {
        $incident->update([
            'heure_started' => $request->heure_started,
            'heure_end' => $request->heure_end,
            'type_panne' => $request->type_panne,
            'action' => $request->action,
            'inpact' => $request->inpact,
            'obsevation' => $request->obsevation,
            'status' => $request->status,
            'entity_id' => $request->entity_id,
        ]);
        return redirect(route('incident.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {

        //  $id = Incident::where('id', $incident->id)->first();

        Incident::find($incident->id)->delete();

        return redirect(route('incident.list'));
    }
}
