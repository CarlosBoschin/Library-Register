<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = auth()->user();
            
            if($user != null)
            {
                $books = [];
                $books = Books::all();

                return $books;
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid credentials!'
                ], 401);
            }
        }
        catch(\Exception $ex)
        {
            return response()->json(["error"=>$ex->getMessage() . ' on line: ' . $ex->getLine()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $user = auth()->user();
            
            if($user != null)
            {
                $book = new Books();
                $book->fill($request->all());
                $book->save();

                return response()->json([
                    'message' => 'Created'
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid credentials!'
                ], 401);
            }
        }
        catch(\Exception $ex)
        {
            return response()->json(["error"=>$ex->getMessage() . ' on line: ' . $ex->getLine()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try
        {
            $user = auth()->user();
            
            if($user != null)
            {
                $book = [];
                $book = Books::where('id', $request->id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'author' => $request->author,
                    'pages' => $request->pages
                ]);

                return response()->json([
                    'message' => 'Updated'
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid credentials!'
                ], 401);
            }
        }
        catch(\Exception $ex)
        {
            return response()->json(["error"=>$ex->getMessage() . ' on line: ' . $ex->getLine()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try
        {
            $user = auth()->user();
            
            if($user != null)
            {
                $book = [];
                $book = Books::find($request->id);

                $book->delete();

                return response()->json([
                    'message' => 'Deleted'
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Invalid credentials!'
                ], 401);
            }
        }
        catch(\Exception $ex)
        {
            return response()->json(["error"=>$ex->getMessage() . ' on line: ' . $ex->getLine()], 500);
        }
    }
}
