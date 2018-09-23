<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    protected $data=[];
    public function index(){
        $userData=Customer::orderBy('cid','desc')->paginate();
        return view('home', compact('userData'));
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'customerName' => 'required|min:3|max:50',
                'address' => 'required',
                'organization' => 'required',
                'email' => 'email',
                'mobile' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif',

            ]);
            if ($request->image == null) {

                return redirect()->back()->with('success', 'Insert Image');
            }

            $data['customerName'] = $request->customerName;
            $data['address'] = $request->address;
            $data['organization'] = $request->organization;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $uploadPath = public_path('lib/image');
                $image->move($uploadPath, $imageName);
                $data['image'] = $imageName;
            }


            if (Customer::create($data)) {
                return redirect()->route('home')->with('success', 'Record is inserted');
            }
        }
    }

    public function deleteUser(Request $request){
        $id=$request->user_id;
        if ($this->deleteImage($id) && Customer::where('cid',$id)->delete()){
            return redirect()->route('home')->with('success', 'Record is deleted');
        }
    }

    public function deleteImage($id){
        $deleteRecord=Customer::findOrFail($id);
        $imageName=$deleteRecord->image;
        $imageDeletePath=public_path('lib/image'.$imageName);
        if(file_exists($imageDeletePath)){
            return unlink($imageDeletePath);
        }
        return true;
    }

    public function editUser(Request $request){
        $id=$request->user_id;
        $edit_record=Customer::findOrFail($id);
        return view('edit_customer', compact('edit_record'));
    }

    public function editAction(Request $request){
        $this->validate($request, [
            'customerName' => 'required|min:3|max:50',
            'address'=>'required',
            'organization'=>'required',
            'email' => 'email',
            'mobile' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);
        $id=$request->userid;
        $data['customerName']=$request->customerName;
        $data['address']=$request->address;
        $data['organization']=$request->organization;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . '.' . $ext;
            $uploadPath = public_path('lib/image');
            if($this->deleteImage($id) && $image->move($uploadPath, $imageName)) {
                $data['image'] = $imageName;
            }
        }
        if (Customer::where('cid',$id)->update($data)){
            return redirect()->route('home')->with('success', 'Record is Updated');
        }
    }
}