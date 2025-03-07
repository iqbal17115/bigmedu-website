<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\UserRole;
use App\User;
use App\Model\Member;
use DB;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function list(){
        $data['users'] = User::with(['user_role'=>function($q){
            $q->with(['role_details']);
        }])->where('id','!=',1)->get();

        return view('backend.user-management.user-info.list',$data);
    }

    public function add(){
        $data['roles'] = Role::where('id','!=',1)->where('id','!=',4)->get();
        return view('backend.user-management.user-info.add',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users,email',
            'password' => 'required',
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password); 
        $data->status = $request->status ?? 0;
        $img = $request->file('image');
        if ($img) {
            $imgName = md5(str_random(30) . time() . '_' . $img) . '.' . $img->getClientOriginalExtension();
            $request->file('image')->move('public/backend/images/user_images/', $imgName);
            $data['image'] = $imgName;
        }
        $data->save();

        if($data->id){
            foreach($request->user_role as $role){
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = $role;
                $user_rule->save();
            }
        }

        return redirect()->route('user.list',['id'=>$data->id])->with('success','Successfully Insert');
    }

    public function edit($id){
        $data['editData'] = User::find($id);
        $data['role_array'] = UserRole::where('user_id',$id)->get()->toArray();
        $data['roles'] = Role::where('id','!=',1)->get();
        return view('backend.user-management.user-info.add',$data);
    }

    public function update(Request $request,$id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password !='' || $request->password != null){
            $data->password = bcrypt($request->password);
        }

        $data->status = $request->status ?? 0;
        
        $img = $request->file('image');
        if ($img) {
            $imgName = md5(str_random(30) . time() . '_' . $img) . '.' . $img->getClientOriginalExtension();
            $request->file('image')->move('public/backend/images/user_images/', $imgName);
            $data['image'] = $imgName;
        }
        $data->save();

        if($data->id){
            UserRole::where('user_id',$data->id)->delete();
            foreach($request->user_role as $role){
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = $role;
                $user_rule->save();
            }
        }

        return redirect()->route('user.list',['id'=>$data->id])->with('success','Successfully Updated');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list')->with('success','Successfully Deleted');
    }

    public function addMemberToUser()
    {
        $data['roles'] = Role::where('id','!=',1)->get();
        $usersExcludeMembers = User::where('member_id','!=',NULL)->get('member_id');
        $exclude_member_id_array = array();
        foreach($usersExcludeMembers as $em)
        {
            $exclude_member_id_array[] = $em->member_id;
        }
        //dd($exclude_member_id_array);

        $data['members'] = Member::whereNotIn('id',$exclude_member_id_array)->get();
        //dd(count($data['members']));
        // $data['members'] = Member::all();
        // dd(count($data['members']));
        return view('backend.user-management.user-info.add-member-to-user',$data);
    }

    //ajax method
    public function memberWiseEmail(Request $request)
    {
        $memberWiseEmail = Member::where('id',$request->member_id)->first();

        if(isset($memberWiseEmail))
		{
			return response()->json($memberWiseEmail);
		}
		else
		{
			return response()->json('fail');
		}
    }

    public function storeMemberToUser(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $member = Member::where('id',$request->member_id)->first();
        // dd($member);
        $data = new User();
        $data->name = $member->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->member_id = $request->member_id;
        $data->status = $request->status ?? 0;
        $data->save();

        if($data->id){
            foreach($request->user_role as $role){
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = $role;
                $user_rule->save();
            }
            $member_role_check = in_array(4,$request->user_role);
            if(!$member_role_check)
            {
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = 4;
                $user_rule->save();
            }
        }

        return redirect()->route('user.list',['id'=>$data->id])->with('success','Successfully Insert');
    }

    public function editMemberToUser($id){
        $data['editData'] = User::find($id);
        $data['role_array'] = UserRole::where('user_id',$id)->get()->toArray();
        $data['roles'] = Role::where('id','!=',1)->get();
        $data['member'] = Member::where('id',$data['editData']->member_id)->first();
        return view('backend.user-management.user-info.add-member-to-user',$data);
    }

    public function updateMemberToUser(Request $request,$id){
        $this->validate($request,[
            'email'=>'required|email',
            'password' => 'confirmed',
        ]);
        $data = User::find($id);
        $member = Member::where('id',$data->member_id)->first();
        // dd($member);
        $data->name = $member->name;
        $data->email = $request->email;
        if($request->password !='' || $request->password != null){
            $data->password = bcrypt($request->password);
        }
        
        $data->status = $request->status ?? 0;

        $data->save();

        if($data->id){
            UserRole::where('user_id',$data->id)->delete();
            
            foreach($request->user_role as $role){
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = $role;
                $user_rule->save();
            }
            $member_role_check = in_array(4,$request->user_role);
            if(!$member_role_check)
            {
                $user_rule = new UserRole();
                $user_rule->user_id = $data->id;
                $user_rule->role_id = 4;
                $user_rule->save();
            }
        }

        return redirect()->route('user.list',['id'=>$data->id])->with('success','Successfully Updated');
    }

    public function updateMemberProfile()
    {
        // Member::find(auth()->user()->member_id);
        return redirect()->route('member_management.edit',\Crypt::encrypt(auth()->user()->member_id));
    }
}
