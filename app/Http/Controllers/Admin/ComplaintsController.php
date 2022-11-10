<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.complaints.index');
    }
    public function ticket(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $complaints = Complaint::where('status', '!=', 'resolved')->where('admin_id', Auth::user()->userable_id)->orWhere('admin_id', null)->orderBy('created_at', 'desc')->paginate($perPage);
        $admins = Admin::pluck('name', 'id');
        $statuses = ['pending','On-hold', 'resolved', 'canceled'];
        return view('panel.complaints.tickets', compact(['complaints', 'admins', 'statuses']));
    }

    public function asign(Request $request, $id){
        $complaint = Complaint::findorfail($id);
        if($request->admin_id != null){
            $complaint->update([
                'admin_id' => $request->admin_id
            ]);

        }else{
            $complaint->update([
                'status' => $request->status
            ]);
        }
        return redirect()->back();
    }

    public function resolved(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $complaints = Complaint::where('status', 'resolved')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('panel.complaints.resolved', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user_id = Auth::user()->id;
        $complaint = Complaint::create([
            'user_id' => $user_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()->route('admin.complaints.ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::findorfail($id);
        return view('panel.complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
