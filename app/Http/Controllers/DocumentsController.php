<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Http\Resources\DocumentResource;

class DocumentsController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get all documents of user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Auth::user()->documents;
 
        return response()->json([
            'success' => true,
            'data' => DocumentResource::collection($documents)
        ]);
    }

    /**
     * Store a new file.
     *
     * @param  App\Http\Requests\StoreDocumentReques $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        if ($request->hasFile('file')) {
            $file_path = $request->file('file')->store('public/files');

            $document = Document::create([
                'name' => $request->name,
                'path' => $file_path,
                'user_id' => Auth::id(),
            ]);

            $response = [
                'success' => true,
                'data'    => new DocumentResource($document),
                'message' => 'File uploaded successfully.'
            ];

            return response()->json($response, 200);
        }

        $response = [
            'success' => false,
            'message' => 'Something went wrong.'
        ];

        return response()->json($response, 500);
    }
}
