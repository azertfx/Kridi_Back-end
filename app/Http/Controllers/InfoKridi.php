<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Material;
use App\Person;
use Validator;

class InfoKridi extends Controller
{
    public function index($name, $id){
    	$mkridis = Material::all()->where('people_id','=',$id);
    	$mrest = Person::where('id','=',$id)->sum('rest');
    	$daterests = Person::where('id','=',$id)->get();
    	$sumkridi = Material::where('people_id','=',$id)->sum('price');
    	return view(proj.'.personpage',['title'=>'الصفحة الشخصية','pname'=>$name, 'pid'=>$id, 'mkridis'=>$mkridis, 'sumkridi'=>$sumkridi, 'mrest'=>$mrest, 'daterests'=>$daterests]);
    }

    public function store(Request $request){
    	$rules = [
            'material'=>'required',
            'price'=>'required|numeric',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'material'=>'المادة',
            'price'=>'الثمن',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            $material = new Material;
            $material->name  = $request->input('material');
            $material->price = $request->input('price');
            $material->people_id  = $request->input('parent');
            $material->save();
            session()->flash('success','جيد');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $findPersons = Person::find($id);
        $findkridi = Material::where('people_id','=',$id)->sum('price');
        return view(proj.'.editperson',['title'=>'صفحة تعديل معلومات الشخص','findPersons'=>$findPersons, 'findkridi'=>$findkridi]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'editname'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'editname'=>'الإسم',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else{
            $pupdate = Person::find($id);
            $pupdate->name  = $request->input('editname');
            $pupdate->save();
            session()->flash('success','جيد');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Person::find($id)->delete();
        Material::where('people_id','=',$id)->delete();
        return redirect('/');
    }
}
