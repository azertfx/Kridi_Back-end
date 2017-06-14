<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Material;
use App\Person;
use Validator;

class PayingPage extends Controller
{
    public function index($name, $id, $total){
    	return view(proj.'.payingpage',['title'=>'صفحة الدفع','pname'=>$name, 'pid'=>$id, 'ptotal'=>$total]);
    }

    public function store(Request $request, $name, $id, $total){
    	$rules = [
            'paying'=>'required|numeric',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'paying'=>'الثمن',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
        	$update = Person::find($id);
        	Material::where('people_id','=',$id)->delete();
            $update->rest  = $total - $request->input('paying');
            $update->save();
            session()->flash('success','جيد');
            return redirect("$name/$id");
        }
    }

    public function edit($name, $id, $price, $total)
    {
        $findMaterials = Material::find($id);
        $findp = Person::find($findMaterials->people_id);
        return view(proj.'.editmaterial',['title'=>'صفحة تعديل المادة','findMaterials'=>$findMaterials,'mname'=>$name,'mid'=>$id,'mprice'=>$price,'mtotal'=>$total,'findp'=>$findp]);
    }

    public function update(Request $request, $name, $id, $price, $total)
    {
        $rules = [
            'editmaterial'=>'required',
            'editprice'=>'required|numeric',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'editmaterial'=>'المادة',
            'editprice'=>'الثمن',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            $mupdate = Material::find($id);
            $mupdate->name  = $request->input('editmaterial');
            $mupdate->price  = $request->input('editprice');
            $mupdate->save();
            $redp = Person::find($mupdate->people_id);
            session()->flash('success','جيد');
            return redirect("/$redp->name/$redp->id");
        }
    }

    public function destroy($name, $id, $price, $total)
    {
        $mupdate = Material::find($id);
        $redp = Person::find($mupdate->people_id);
        Material::find($id)->delete();
        return redirect("/$redp->name/$redp->id");
    }
}
