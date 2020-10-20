@extends('template.default')
@section('title', 'Edit')

@section('content')

<div class="albums py-5 bg-light">
    <div class="container">
    
      <h1>Edit Album</h1> 
      <hr>  
      
      <form action="/albums/{{$album->id}}" method="POST">
        @csrf()
        @method('PATCH')
        <div class="form-group">
          <label for="albumname">Album name</label>
          <input type="text" name="albumname" id="albumname" value="{{$album->album_name}}" class="form-control" placeholder="Album name">
          <label for="albumdescription">Album description</label>
          <textarea name="albumdescription" id="albumdescription" class="form-control" placeholder="Album description">{{$album->album_description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        
    </div> <!-- /.row -->
</div> <!-- /.albums -->
    
@endsection