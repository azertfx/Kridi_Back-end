@if (count($errors) > 0)
  <div class="errors validatemsg">
      <ul>
          @foreach ($errors->all() as $error)
              <li style="color:red;">{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if (session()->has('error'))
  <div class="errors validatemsg">
    <p style="color:red;">{{session()->get('error')}}</p>
  </div>
@endif

@if (session()->has('success'))
  <div class="success validatemsg">
    <h5 style="color:green;">تمت الإضافة بنجاح</h5>
  </div>
@endif