<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
// use App\Students;
use App\Events\NewMessage;
use Validator;
use DB;
// use Storage;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get()
    {
        // $contacts = User::where('id', '!=', auth()->id())->get();
        
        // get all users except the authenticated one
        // $contacts = Students::where('id', '!=', auth()->id())->get();

        // get all students that we have chat with
        // $contacts = Students::select(\DB::raw('students.*'))
        // ->leftJoin('messages', function($join){
        //     $join->on('students.id','=','messages.to');
        // })
        // ->where('messages.from',auth()->id())
        // ->groupBy('messages.to')
        // ->get();
            $contacts = collect(\DB::select('SELECT * FROM (
                (SELECT s.id, s.name, s.photo, s.acad_prog_desc, S.admit_term FROM students s
                left join messages m on s.id = m.`to`
                where m.`from` = '.auth()->id().'
                group by s.id)
                    UNION ALL
                (SELECT s.id, s.name, s.photo, s.acad_prog_desc, S.admit_term FROM students s
                left join messages m on s.id = m.`from`
                where m.`to` = '.auth()->id().'
                group by s.id)
            ) as s
                group by s.id'));
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return response()->json($contacts);
    }

    public function getMessagesFor($id){
        // $messages = Message::where('from', $id)->orWhere('to', $id)->orderBy('created_at','asc')->limit(50)->get();
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->limit(50)
        ->get();

        return response()->json($messages);
    }

    public function sendMessages(Request $request){

        $messages = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text,
            'type' => 0,
        ]);

        broadcast(new NewMessage($messages));

        return response()->json($messages);
    }

    public function sendAttachment(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|file:jpeg,jpg,png,gif'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        } else {
            $imageData = $request->image;
            $file_ext = $imageData->getClientOriginalExtension();
            $fileName = 'chat_'.auth()->id().'_'.date('YmdHis').'.'.$file_ext;
            $imageData->move(public_path('uploads/chat/'),$fileName);
            $messages = Message::create([
                'from' => auth()->id(),
                'to' => $request->contact_id,
                'text' => $fileName,
                'type' => 1,
            ]);

            broadcast(new NewMessage($messages));

            return response()->json($messages);
        }
    }

    public function readMessages(Request $request){

        $messages = Message::where('id', $request->id)->update(['read' => true]);

        return response()->json($messages);
    }

}
