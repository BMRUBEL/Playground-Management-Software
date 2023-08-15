<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Guaranter;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Member::all();
        return view('admin.members.member', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $branches = Branch::all();
        $members = Member::all();

        $guaranters = Guaranter::all();
        return view('admin.members.add_member', compact('users', 'branches', 'members', 'guaranters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => '',
        //     'status'=>'',
        //     'email'=>'required|email',
        //     'mobile'=>'',
        //     'business_name'=>'',
        //     'member_no'=>'',
        //     'gender'=>'',
        //     'city'=>'',
        //     'address'=>'',
        //     'credit_source'=>'',
        //     'photo'=>'required|mimes:jpeg,jpg,png,gif,csv,txt,pdf',
        //     'birth_certificate'=>'required|mimes:jpeg,jpg,png,gif,csv,txt,pdf',
        //     'user_id'=>'',
        //     'branch_id'=>'',
        //     'buranter_id'=>'',


        // ]);

        $data = $request->all();
        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $request->photo->move(public_path('uploads/'), $fileName);
        $data['photo'] = $fileName;
        $nid = time() . '_' . $request->file('nid')->getClientOriginalName();
        $data['nid'] = $nid;
        $request->nid->move(public_path('uploads/'), $nid);
        $birth = time() . '_' . $request->file('birth_certificate')->getClientOriginalName();
        $request->birth_certificate->move(public_path('uploads/'), $birth);
        $data['birth_certificate'] = $birth;
        // dd($data);

        Member::create($data);
        //    dd($request);
        return redirect()->route('member.index')->with('msg', 'member Insert Successfully Inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $branches = Branch::all();
        $members = Member::all();
        $member = Member::find($id);
        $guaranters = Guaranter::all();
        return view('admin.members.edit_member', compact('member', 'users', 'branches', 'members', 'guaranters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->photo->move(public_path('uploads/'), $fileName);
            $data['photo'] = $fileName;
        }

        if ($request->hasFile('nid')) {
            $nid = time() . '_' . $request->file('nid')->getClientOriginalName();
            $request->nid->move(public_path('uploads/'), $nid);
            $data['nid'] = $nid;
        }

        if ($request->hasFile('birth_certificate')) {
            $birth = time() . '_' . $request->file('birth_certificate')->getClientOriginalName();
            $request->birth_certificate->move(public_path('uploads/'), $birth);
            $data['birth_certificate'] = $birth;
        }

        Member::find($id)->update($data);
        return redirect()->route('member.index')->with('msg', 'Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::find($id)->delete();
        return redirect()->route('member.index')->with('msg', 'Member Deleted Successfully');
    }
}
