@extends(proj.'.index')
@section('kridiContent')
	<!-- content homepage -->
  	<div class="container hpcontent">
  		<div class="row">
  			<div class="col s12 m6">
  				<a href="#material" class="waves-effect waves-light btn-large addbtn">أضف</a>
  			</div>
  			<div class="col s12 m6">
  			<?php $ktotal = $sumkridi + $mrest; ?>
  				<a href="{{ url("$pname/$pid/$ktotal") }}" class="right waves-effect waves-light btn-large addbtn">الدفع</a>
  			</div>
  		</div>
  		<div class="clear"></div>
  		<!-- edite delete -->
  		<div class="personed">
  			{!! Form::open(['method'=>'delete','url'=>"$pid"]) !!}
  			 <button class="modal-trigger dpbtn" href="#modal2">حذف الشخص</button>
              <div id="modal2" class="modal mpopup">
                <div class="modal-content">
                  <h4>? هل تريد فعلا حذف {{$pname}}</h4>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="right modal-action modal-close waves-effect waves-green btn-flat">نعم</button>
                  <a href="#!" class="left modal-action modal-close waves-effect waves-green btn-flat">لا</a>
                </div>
              </div>
  			 / <a href="{{url("$pid")}}">تعديل الإسم</a> 
            {!! Form::close() !!}
  		</div><!-- /edite delete -->
  		<!-- all persons and kridi -->
  		<div class="row rsltat z-depth-1">
  			<div class="col s12 m6 right">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الإسم</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$pname}}</span>
  					</div>
  				</div>
  			</div>
  			<div class="col s12 m6">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الكريدي</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$ktotal}}</span>
  					</div>
  				</div>
  			</div>
  		</div><!-- /all persons and kridi -->
  		<!-- table homepage-->
		<table class="striped">
			<thead>
			  <tr>
			      <th data-field="delete">حذف</th>
			      <th data-field="edit">تعديل</th>
			      <th data-field="date">التاريخ</th>
			      <th data-field="price">الثمن</th>
			      <th data-field="material">المادة</th>
			  </tr>
			</thead>
			<tbody class="ed">
			  <tr>
			  	<td><a href="#!"></a></td>
			  	<td><a href="#!"></a></td>
			  	@foreach ($daterests as $daterest)
			  	<td>{{$daterest->updated_at}}</td>
			  	@endforeach
			    <td>{{$mrest}}</td>
			    <td>الباقي</td>
			  </tr>
			@foreach ($mkridis as $mkridi)
			  <tr>
	          	{!! Form::open(['method'=>'delete','url'=>"$mkridi->name/$mkridi->id/$mkridi->price/$ktotal"]) !!}
	  			 	<td><button class="modal-trigger dpbtn" href="#modal4">حذف</button></td>
	              	<div id="modal4" class="modal mpopup">
		                <div class="modal-content">
		                  <h4>? هل تريد فعلا حذف المادة</h4>
		                </div>
		                <div class="modal-footer">
		                  <button type="submit" class="right modal-action modal-close waves-effect waves-green btn-flat">نعم</button>
		                  <a href="#!" class="left modal-action modal-close waves-effect waves-green btn-flat">لا</a>
		                </div>
	              	</div>
	            {!! Form::close() !!}
			  	<td><a href="{{url("$mkridi->name/$mkridi->id/$mkridi->price/$ktotal")}}">تعديل</a></td>
			  	<td>{{$mkridi->updated_at}}</td>
			    <td>{{$mkridi->price}}</td>
			    <td>{{$mkridi->name}}</td>
			  </tr>
			@endforeach
			</tbody>
		</table>
		<!-- form add new person -->
		@include(proj.'.errors')
		<div class="row">
		    {!! Form::open(['url'=>url("/$pname/$pid/addkridi"),'class'=>'col s12']) !!}
		      <div class="row">
		        <div class="input-field col s12 m2">
		        <button type="submit" class="waves-effect waves-light btn-large addbtn">أضف</button>
		      	</div>
		        <div class="input-field col s12 m5">
		          <input name="parent" type="hidden" value="{{$pid}}" class="validate">
		          <input id="price" name="price" value="{{old('price')}}" type="text" class="validate">
		          <label for="price">الثمن</label>
		        </div>
		        <div class="input-field col s12 m5">
		          <input id="material" name="material" value="{{old('material')}}" type="text" class="validate">
		          <label for="material">المادة</label>
		        </div>
		      </div>
		    {!! Form::close() !!}
		</div><!-- /form add new person -->
  	</div><!-- /content homepage -->
@stop