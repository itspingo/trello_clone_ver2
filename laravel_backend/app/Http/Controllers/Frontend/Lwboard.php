<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\boards_model;
use App\Models\board_lists_model;
use App\Models\list_cards_model;


// use Carbon\Carbon;

class Lwboard extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
       
    }

 
    public function index()
    {
        $data['page_title']="Board";       
        return view('frontend/lwboard',$data);
    }

   
public function create_list(Request $request)
{
    $data['page_title'] = "Board";

    // Retrieve the board ID from the request
    $boardid = $request->input('boardId');

    // Calculate the next sequence value (assuming you want to increment the sequence)
    $maxSeq = board_lists_model::where('board_id', $boardid)->max('seq');
    $newSeq = $maxSeq ? $maxSeq + 1 : 1;

    // Create the new list record
    $rec = [
        'board_id' => $boardid,
        'title' => 'New List', // You might want to retrieve this from the request if it's dynamic
        'seq' => $newSeq,
    ];

    
    // Save the record and get the created ID
    $recid = board_lists_model::create($rec);

    // Return the newly created record as JSON
    return ['listId'=>$recid];
}

public function updateEventDates($eventData)
{
    // Fetch the event by ID and update its dates
    $event = list_cards_model::find($eventData['id']);
    $event->start_date = $eventData['start'];
    $event->end_date = $eventData['end'];
    $event->save();

    // Optionally, refresh the calendar
    $this->loadBoard($this->boardId);
}


}
