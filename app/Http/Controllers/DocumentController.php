<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Document::query()->with(['user:id,name,image', 'city:id,name', 'etablissement:id,name'])
            ->where('status', '=', 1)
            ->where('type', '=', 1)
            ->select('id', 'images', 'name', 'description', 'user_id', 'city_id', 'etablissement_id', 'module_id')
            ->paginate(6);

    }

    public function get_books()
    {
        return Document::query()->with('user:id,name,image')
            ->where('status', '=', 1)
            ->where('type', '=', 0)
            ->select('id', 'images', 'name', 'description', 'user_id', 'price', 'state', 'prof')
            ->paginate(6);
    }

    public function search_documents($keyword)
    {
        return Document::query()->with('user:id,name,image')
            ->where('status', '=', 1)
            ->where('type', '=', 1)
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'Like', '%' . $keyword . '%')
                    ->orWhere('description', 'Like', '%' . $keyword . '%')
                    ->orWhere('prof', 'Like', '%' . $keyword . '%');
            })
            ->select('id', 'images', 'name', 'description', 'user_id', 'price', 'state', 'prof')
            ->paginate(6);
    }

    public function search_books($keyword)
    {
        return Document::query()->with('user:id,name,image')
            ->where('status', '=', 1)
            ->where('type', '=', 0)
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'Like', '%' . $keyword . '%')
                    ->orWhere('description', 'Like', '%' . $keyword . '%')
                    ->orWhere('prof', 'Like', '%' . $keyword . '%');
            })
            ->select('id', 'images', 'name', 'description', 'user_id', 'price', 'state', 'prof')
            ->paginate(6);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        Document::create($request->all());
        return response()->json(
            ['msg' => 'document has been created'],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
