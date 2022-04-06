<?php

namespace Acelle\Http\Controllers;

use Acelle\Model\QuestionChoice;
use Acelle\Model\Category;
use Illuminate\Http\Request;

class QuestionChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('id',1)->first();
        // dd($category);
        return view('frontquestion',compact('category'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storeform(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Acelle\Model\QuestionChoice  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionChoice $questionChoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Acelle\Model\QuestionChoice  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionChoice $questionChoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Acelle\Model\QuestionChoice  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionChoice $questionChoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Acelle\Model\QuestionChoice  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionChoice $questionChoice)
    {
        //
    }
}
