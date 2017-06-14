@extends(proj.'.index')
@section('kridiContent')
	<!-- content homepage -->
  	<div class="container hpcontent">
  		<div class="row">
  			<div class="col s12 m6">
  				<a href="{{ url("$findp->name/$findp->id") }}" class="waves-effect waves-light btn-large addbtn">أضف</a>
  			</div>
  			<div class="col s12 m6">
  				<a href="{{ url("$findp->name/$findp->id/$mtotal") }}" class="right waves-effect waves-light btn-large addbtn">الدفع</a>
  			</div>
  		</div>
  		<div class="clear"></div>
  		<!-- all persons and kridi -->
  		<div class="row rsltat z-depth-1">
  			<div class="col s12 m6 right">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  المادة</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$mname}}</span>
  					</div>
  				</div>
  			</div>
  			<div class="col s12 m6">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الثمن</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$mprice}}</span>
  					</div>
  				</div>
  			</div>
  		</div><!-- /all persons and kridi -->
		<!-- form add new person -->
		@include(proj.'.errors')
		<div class="row">
		    {!! Form::open(['url'=>url("/$mname/$mid/$mprice/$mtotal/update"),'class'=>'col s12']) !!}
		      <div class="row">
		        <div class="input-field col s12 m2">
			        <button class="waves-effect waves-light btn modal-trigger btn-large addbtn" href="#modal3">تعديل</button>
	                <div id="modal3" class="modal mpopup">
		                <div class="modal-content">
		                  <h4>? هل تريد فعلا تغيير المادة</h4>
		                </div>
		                <div class="modal-footer">
		                  <button type="submit" class="right modal-action modal-close waves-effect waves-green btn-flat">نعم</button>
		                  <a href="#!" class="left modal-action modal-close waves-effect waves-green btn-flat">لا</a>
		                </div>
	                </div>
		      	</div>
		        <div class="input-field col s12 m5">
		          <input id="editprice" name="editprice" value="{{$mprice}}" type="text" class="validate">
		          <label for="editprice">الثمن</label>
		        </div>
		        <div class="input-field col s12 m5">
		          <input id="editmaterial" name="editmaterial" value="{{$mname}}" type="text" class="validate">
		          <label for="editmaterial">المادة</label>
		        </div>
		      </div>
		    {!! Form::close() !!}
		</div><!-- /form add new person -->
  	</div><!-- /content homepage -->
@stop