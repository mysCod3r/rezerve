<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Table;
use App\Models\Reservation;


class ReservationController extends Controller
{
    public function index(){
        $reservation = Reservation::all();
        return view('admin.reservation.index', compact('reservation'));
    }
    public function create(){
        $tables = Table::where('status' , TableStatus::Avaliable)->get();
        return view('admin.reservation.create' , compact('tables'))->with('success' , 'Menu created successfuly');
    }
    public function store(ReservationStoreRequest $request){
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning' , 'Please choose the table base on guests');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if (Carbon::parse($res->res_date)->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning' , 'This table is reserved for this date');
            }
        }
        Reservation::create($request->validated());
        return to_route('admin.reservation.index'); 
    }
    public function edit(Reservation $reservation){
        return view('admin.reservation.edit' , compact('reservation'));
    }

}
