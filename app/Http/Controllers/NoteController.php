<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

/*
Verb    Path                        Action  Route Name
GET     /users                      index   users.index
GET     /users/create               create  users.create
POST    /users                      store   users.store
GET     /users/{user}               show    users.show
GET     /users/{user}/edit          edit    users.edit
PUT     /users/{user}               update  users.update
DELETE  /users/{user}               destroy users.destroy
*/

class NoteController extends Controller
{
    public function index()
    {
    	$notes = [];

    	if(isset($_GET['user_id'])) {
    		$_GET['user_id'] = (int)$_GET['user_id'];
    		$notes = Note::where('user_id', $_GET['user_id'])->get();
    	}

    	return response()->json(['success' => true, 'notes' => $notes]);
    }

    public function store(Request $request)
    {
    	$note = Note::create($request->all());

    	return response()->json(['success' => true, 'notes' => $note]);
    }

    public function destroy(Request $request, $note)
    {
        Note::destroy($note);

        return response()->json(['success' => true]);
    }
}
