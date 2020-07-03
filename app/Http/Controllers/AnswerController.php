<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;
use App\Models\QuestionModel;

class AnswerController extends Controller 
{
	public function index($id){
		$question = QuestionModel::get_single_data($id);
		$question = json_decode(json_encode($question), true);
		$answer = AnswerModel::get_single_data($id);
		$question['answer'] = json_decode(json_encode($answer), true);
		$question['count'] = AnswerModel::get_single_data($id)->count();
		return view('crud.single',compact('question'));
	}

	public function store(Request $request,$id){
    	$description = $request->input('description');
    	$data = array('id_question'=>$id,"description"=>$description);
    	$question = AnswerModel::save($data);
    	return redirect()->action('AnswerController@index',$id);
    }
}
