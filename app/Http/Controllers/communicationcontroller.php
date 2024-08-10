<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\communication;

class communicationcontroller extends Controller
{
    //function to display the form
    public function index()
    {
        $users = communication::all();
        return view('communication', compact('users'));
    }

    //function to store the data
    public function store(Request $request)
    {
        $request->validate([
            'communication_id' => 'required|numeric',
            'staff_id' => 'required|numeric|exists:staff_information,staff_id',
            'message' => 'required|string|max:255',
            'notification' => 'required',
            'meeting_schedule' => 'required'
        ]);
        $communication = new communication();
        $communication->communication_id = $request->input('communication_id');
        $communication->staff_id = $request->input('staff_id');
        $communication->message = $request->input('message');
        $communication->notification = $request->input('notification');
        $communication->meeting_schedule = $request->input('meeting_schedule');
        $communication->save();
        return redirect()->back()->with('success', 'Data stored successfully!');
    }

    //function to delete the data
    public function delete($communication_id)
    {
        $communication = communication::find($communication_id);
        $communication->delete();
        return redirect()->back();
    }

    //function to edit the data
    public function edit($communication_id)
    {
        $communication = communication::find($communication_id);
        return view('editcommunication', compact('communication'));
    }

    //function to update the data
    public function update(Request $data)
    {
        $data->validate([
            'communication_id' => 'required|numeric',
            'staff_id' => 'required|numeric|exists:staff_information,staff_id',
            'message' => 'required|string|max:255',
            'notification' => 'required',
            'meeting_schedule' => 'required'
        ]);
        $communication = communication::find($data->input('update_id'));
        $communication->communication_id = $data->input('communication_id');
        $communication->staff_id = $data->input('staff_id');
        $communication->message = $data->input('message');
        $communication->notification = $data->input('notification');
        $communication->meeting_schedule = $data->input('meeting_schedule');
        $communication->save();
        return redirect()->route('communication.view')->with('success', 'Data updated successfully!');
    }

    //function to view the data
    public function view()
    {
        $users = communication::all();
        return view('communicationview', compact('users'));
    }
}
