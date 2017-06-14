@extends(proj.'.index')
@section('kridiContent')
	<!-- content homepage -->
  	<div class="container hpcontent">
  		<!-- botton add person -->
  		<a href="#personname" class="right waves-effect waves-light btn-large addbtn">أضف شخص</a><!-- /botton add person -->
  		<div class="clear"></div>
  		<!-- all persons and kridi -->
  		<div class="row rsltat z-depth-1">
  			<div class="col s12 m6">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الكريدي</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$allKridis + $allrests}}</span>
  					</div>
  				</div>
  			</div>
  			<div class="col s12 m6 ">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  عدد الأشخاص</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$allPersonsCount}}</span>
  					</div>
  				</div>
  			</div>
  		</div><!-- /all persons and kridi -->
  		<!-- table homepage-->
		<table class="striped">
			<thead>
			  <tr>
			      <th data-field="hide">دفع</th>
			      <th data-field="add">أضف</th>
			      <th data-field="kridi">الكريدي</th>
			      <th data-field="name">الإسم</th>
			  </tr>
			</thead>
			<tbody>
			@foreach ($allPersons as $allPerson)
			  <?php $kpersons = \App\Material::where('people_id','=',$allPerson->id)->sum('price');
			  	$tkridi = $kpersons + $allPerson->rest;
	          ?>
			  <tr>
			    <td>  <a href='{{ url("$allPerson->name/$allPerson->id/$tkridi") }}' class="btn-floating btn-large waves-effect waves-light bgcolor">-</a></td>
			    <td>  <a href='{{ url("$allPerson->name/$allPerson->id") }}' class="btn-floating btn-large waves-effect waves-light gcolor">+</a></td>
			    <td>{{ $tkridi }}</td>
			    <td>{{ $allPerson->name }}</td>
			  </tr>
			@endforeach()
			</tbody>
		</table>
		<!-- form add new person -->
		@include(proj.'.errors')
		<div class="row">
			{!! Form::open(['route'=>'store','class'=>'col s12']) !!}
		      <div class="row">
		        <div class="input-field col s12 m2">
		        	<button type="submit" class="waves-effect waves-light btn-large addbtn">أضف</button>
		      	</div>
		        <div class="input-field col s12 m5">
		          <input id="kridi" value="{{old('kridi')}}" name="kridi" type="text" class="validate">
		          <label for="kridi">الكريدي</label>
		        </div>
		        <div class="input-field col s12 m5">
		          <input id="personname" value="{{old('personname')}}" name="personname" type="text" class="validate">
		          <label for="personname">الإسم</label>
		        </div>
		      </div>
		    {!! Form::close() !!}
		</div><!-- /form add new person -->
  	</div><!-- /content homepage -->
@stop