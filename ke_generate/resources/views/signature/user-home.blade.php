@extends('tamplate.layout')

@section('content')
<div class="container">
   
   <div class="panel panel-primary">
     <div class="panel-heading"><h2>Document for Verification</h2></div>
     <div class="panel-body">
 
       @if (count($errors) > 0)
           <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
 
       @auth
       <form action="/verify-file" style ="width:100%" method="POST" enctype="multipart/form-data">
           @csrf

           <div class="form-group files">
                <label>Upload Your Document : </label>
                <input type="file" class="form-control" name="file" required>
            </div>
            <br>
  
            <div style ="width:100%" class="col-md-6">
                <button style ="width:100%" type="submit" class="btn btn-outline-info">Verify</button>
            </div>

       </form>
       @endauth
       @guest
       <form action="/verify-public" style ="width:100%" method="POST" enctype="multipart/form-data">
           @csrf

           <div class="form-group files">
                <label>Upload Your Document : </label>
                <input type="file" class="form-control" name="file" required>
            </div>
            <br>
  
            <div style ="width:100%" class="col-md-6">
                <button style ="width:100%" type="submit" class="btn btn-outline-info">Verify</button>
            </div>

       </form>
       @endguest
       <br><br>

       @if ($message = Session::get('success'))
       <iframe style ="width:100%" height="500px" src="verify_file/{{ Session::get('file') }}"></iframe>
       <div class="alert alert-success alert-block">
               <strong>{{ $message }}</strong>
       </div>
        @elseif($message = Session::get('error'))
        <iframe style ="width:100%" height="500px" src="verify_file/{{ Session::get('file') }}"></iframe>
        <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
        </div>
       @endif
 
     </div>
   </div>
</div>
@endsection