<?php

namespace App\Services;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function getByWeek()
    {
        $items = DB::table('categories')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return $items;
    }
    public function getList($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $contacts = Contact::where('title', 'like', '%' . $keyword . '%')->paginate(10);
            return $contacts;
        }
        $contacts = Contact::paginate(10);
        return $contacts;
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            return abort(404);

        }
        return  $contact->delete();
    }

    public function store($data)
    {

        $contactData = [
            'user_name' => $data->user_name,
            'email' => $data->email,
            'title' => $data->title,
            'message' => $data->message,
        ];

        $contact = Contact::create($contactData);
        return $contact;
    }

}
