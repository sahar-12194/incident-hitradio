<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntityRequest;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Entity::orderBy('created_at', 'DESC')->get();

        return view('Entity.list')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entity.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntityRequest $request)
    {

        $entity =  Entity::create([
            'name' => $request->name,
            'observation' => $request->observation,
        ]);

        //   dd($entity);

        return redirect()->route('entity.list');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etity  $etity
     * @return \Illuminate\Http\Response
     */
    public function show(Entity $etity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etity  $etity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Entity::orderBy('created_at', 'DESC')
            ->get();
        $entity = Entity::where('id', $id)->first();

        return view('Entity.list')
            ->with('entity', $entity)
            ->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etity  $etity
     * @return \Illuminate\Http\Response
     */
    public function update(EntityRequest $request, Entity $entity)
    {
        $entity->update([
            'name' => $request->name,
            'observation' => $request->observation,

        ]);
        return redirect(route('entity.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etity  $etity
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Entity::find($id)->delete();

        return redirect(route('entity.list'))->with('success', 'Item successfully deleted!');
    }
}
