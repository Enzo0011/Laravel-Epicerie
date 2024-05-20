<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqAnswer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $questions = Faq::paginate(10);
        $answers = FaqAnswer::all();

        return view('contact.index', [
            'questions' => $questions,
            'answers' => $answers
        ]);
    }

    public function show($id)
    {
        $question = Faq::find($id);
        $answers = FaqAnswer::all()->where('faq_id', $id);

        return view('contact.show', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->object = $request->object;
        $faq->description = $request->description;
        $faq->user()->associate(auth()->user());
        $faq->save();

        return redirect()->route('contact.index');
    }

    public function edit($id)
    {
        $question = Faq::find($id);

        return view('contact.edit', [
            'question' => $question
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->save();

        return redirect()->route('contact.index');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->route('contact.index');
    }
}
