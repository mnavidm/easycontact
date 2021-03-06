<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'avatar' => 'image'
        ]);

        $filenameToStore = "";
        if ($request['avatar'] != null) {
            $filenameWithExtension = $request->file('avatar')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('avatar')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;


            $request->file('avatar')->storeAs('public/avatars', $filenameToStore);
        }

        $contact = Contact::create(array_merge($request->only('name', 'family', 'company', 'jobtitle', 'address'
            , 'birthday', 'note'), ['user_id' => auth()->id()], ['avatar' => $filenameToStore]));

        return redirect(route('contact.show', $contact));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view("contact.edit", compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'avatar' => 'image'
        ]);

        if ($request['avatar'] != null) {
            $filenameWithExtension = $request->file('avatar')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('avatar')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;


            $request->file('avatar')->storeAs('public/avatars', $filenameToStore);

            //Delete old file ?

            $contact->update(array_merge($request->only('name', 'family', 'company', 'jobtitle', 'address'
                , 'birthday', 'note'), ['avatar' => $filenameToStore]));
        } else {
            $contact->update($request->only('name', 'family', 'company', 'jobtitle', 'address'
                , 'birthday', 'note'));
        }


        return redirect(route('contact.show', $contact));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect(route('home'));
    }
}
