@extends('template.default')
@section('title', 'Create')

@section('content')

<div class="albums py-5 bg-light">
    <div class="container">
    
      <h1>Create Album</h1> 
      <hr>  
      
    <form action="{{route('albums.store')}}" method="POST">
        @csrf()
        @method('POST')
        <div class="form-group">
          <label for="albumname">Album name</label>
          <input type="text" name="albumname" id="albumname" value="" class="form-control">
          <label for="albumdescription">Album description</label>
          <textarea name="albumdescription" id="albumdescription" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        
    </div> <!-- /.row -->
</div> <!-- /.albums -->
    
@endsection