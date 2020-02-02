<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\input;
use App\Appointment;
use response;

class AppointmentController extends Controller
{
    /**
     * Store a new Appointment.
     *
     * @param  Request  $request
     * @return Response
     */
    public function bookAppointment(Request $request) {
        $validator = Validator::make($request->all(), [
            'surname' => ['required', 'min:4', 'max:255', 'alpha'],
            'date' => ['required'],
            'purpose'=> ['required', 'min:4', 'max:255']
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->error()->all()]);
        }

        // Store the blog post...
        $appointment = new Appointment;
        $appointment->surname = $request->input('surname');
        $appointment->date = $request->input('date');
        $appointment->purpose = $request->input('purpose');
        $appointment->save();
       // return response()->json($appointment);


        //return $request->all();
    }

    public function showAppointment() {
        $appointment = Appointment::orderBy('created_at', 'desc')->simplePaginate(4);
        return view('dashboard.bookAppointment')->with('appointments', $appointment);
    }

    public function destroy($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
       // return response()->json($appointment);
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $appointment  = Appointment::where($where)->first();
 
        return Response::json($appointment);
    }
 
}
