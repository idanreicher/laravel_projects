<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Booking::withTrashed()->get()->dd();
        $booking = Booking::paginate(10);

        return view('bookings.index', ['bookings' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get()->pluck('name', 'id')->prepend('none');
        $rooms = DB::table('rooms')->get()->pluck('number', 'id');

        return  view('bookings.create', [

            'users' => $users,
            'rooms' => $rooms,
            'booking' => new Booking()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $id = DB::table('bookings')->insertGetId([
        //     'room_id' => $request->Input('room_id'),
        //     'start' => $request->Input('start'),
        //     'end' => $request->Input('end'),
        //     'is_reservation' => $request->Input('is_reservation', false),
        //     'is_paid' => $request->Input('is_paid', false),
        //     'notes' => $request->Input('notes'),
        // ]);
        $booking = Booking::create($request->input());

        DB::table('bookings_users')->insert([
            'booking_id' => $booking->id,
            'user_id' => $request->input('user_id')
        ]);

        return redirect()->action('BookingController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {

        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $users = DB::table('users')->get()->pluck('name', 'id')->prepend('none');
        $rooms = DB::table('rooms')->get()->pluck('number', 'id');
        $bookingsUser = DB::table('bookings_users')->where('booking_id', $booking->id)->first();

        return  view('bookings.edit', [

            'users' => $users,
            'rooms' => $rooms,
            'bookingsUser' => $bookingsUser,
            'booking' => $booking

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        // DB::table('bookings')->where('id', $booking->id)->update([
        //     'room_id' => $request->Input('room_id'),
        //     'start' => $request->Input('start'),
        //     'end' => $request->Input('end'),
        //     'is_reservation' => $request->Input('is_reservation', false),
        //     'is_paid' => $request->Input('is_paid', false),
        //     'notes' => $request->Input('notes'),
        // ]);
        $booking->fill($request->input());
        $booking->save();

        DB::table('bookings_users')->where('booking_id', $booking->booking_id)->update([
            'user_id' => $request->input('user_id')
        ]);

        return redirect()->action('BookingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {

        DB::table('bookings_users')->where('booking_id', $booking->id)->delete();
        $booking->delete();

        return redirect()->action('BookingController@index');
    }
}
