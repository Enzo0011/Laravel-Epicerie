<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqAnswer;
use Illuminate\Http\Request;

class faqAnswerController extends Controller
{
    public function create(Request $request)
    {
        $faq = Faq::find($request->id);
        return view('faqAnswer.create', compact('faq'));
    }

    public function store(Request $request)
    {
        $faqAnswer = new FaqAnswer();
        $faqAnswer->answer = $request->answer;
        $faqAnswer->faq_id = $request->faq_id;
        $faqAnswer->user()->associate(auth()->user());
        $faqAnswer->save();

        return redirect()->route('contact.index');
    }

    public function edit($id)
    {
        $faqAnswer = FaqAnswer::find($id);

        return view('faqAnswer.edit', [
            'faqAnswer' => $faqAnswer
        ]);
    }

    public function update(Request $request, $id)
    {
        $faqAnswer = FaqAnswer::find($id);
        $faqAnswer->answer = $request->answer;
        $faqAnswer->faq_id = $request->faq_id;
        $faqAnswer->user()->associate(auth()->user());
        $faqAnswer->save();

        return redirect()->route('contact.index');
    }

    public function destroy($id)
    {
        $faqAnswer = FaqAnswer::find($id);
        $faqAnswer->delete();

        return redirect()->route('contact.index');
    }
}
