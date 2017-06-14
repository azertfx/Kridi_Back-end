@extends(proj.'.index')
@section('kridiContent')
	<!-- content homepage -->
  	<div class="container hpcontent">
  		<div class="row">
  			<div class="col s12 m6">
  				<a href="{{ url("$findPersons->name/$findPersons->id") }}" class="waves-effect waves-light btn-large addbtn">أضف</a>
  			</div>
  			<div class="col s12 m6">
  			<?php $kridit = $findkridi + $findPersons->rest;?>
  				<a href="{{ url("$findPersons->name/$findPersons->id/$kridit") }}" class="right waves-effect waves-light btn-large addbtn">الدفع</a>
  			</div>
  		</div>
  		<!-- /botton add person -->
  		<div class="clear"></div>
  		<!-- all persons and kridi -->
  		<div class="row rsltat z-depth-1">
  			<div class="col s12 m6">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الكريدي</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$findkridi + $findPersons->rest}}</span>
  					</div>
  				</div>
  			</div>
  			<div class="col s12 m6 ">
  				<div class="row">
  					<div class="col s6 right textr">
  						<span>:  الإسم</span>
  					</div>
  					<div class="col s6 textr textc">
  						<span>{{$findPersons->name}}</span>
  					</div>
  				</div>
  			</div>
  		</div><!-- /all persons and kridi -->
		@include(proj.'.errors')

		<div class="row">
			{!! Form::open(['url'=>url("/$findPersons->id/update"),'class'=>'col s12']) !!}
		      <div class="row">
		        <div class="input-field col s12 m2">
              <button class="waves-effect waves-light btn modal-trigger btn-large addbtn" href="#modal1">تعديل</button>
              <div id="modal1" class="modal mpopup">
                <div class="modal-content">
                  <h4>? هل تريد فعلا تغيير إسم {{$findPersons->name}}</h4>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="right modal-action modal-close waves-effect waves-green btn-flat">نعم</button>
                  <a href="#!" class="left modal-action modal-close waves-effect waves-green btn-flat">لا</a>
                </div>
              </div>
            </div>
            <div class="input-field col s12 m5">
              <input id="editname" value="{{$findPersons->name}}" name="editname" type="text" class="validate">
              <label for="editname">الإسم</label>
            </div>
          </div>
        {!! Form::close() !!}
		</div><!-- /form add new person -->
  	</div><!-- /content homepage -->
@stop