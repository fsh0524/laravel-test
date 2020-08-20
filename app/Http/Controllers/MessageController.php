<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index(Request $req)
	{
		$messages =
			Message::orderBy('created_at', 'desc')
				->orderBy('id', 'desc')
                ->paginate(5);

	    return view('messages.index', [
	    	'messages' => $messages
	    ]);
	}

	public function store(Request $req)
	{
		$this->validate($req, [
			'content' => 'required|min:21'
		]);

		$rec = new Message;
		$rec->content = $req->input('content');
		$rec->author_id = $req->user()->id;

		$rec->save();

		return redirect('/')->with('message', '送出成功！');
	}

}
