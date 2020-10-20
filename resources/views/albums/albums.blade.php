@extends('template.default')

@section('title', 'Albums')

@section('content')

<div class="albums py-5 bg-light">
    <div class="container">
    
        <h1>Albums</h1> 
        @if(session()->has('message'))
        <div class="alert alert-danger">{{session()->get('message')}}</div>
        @endif
        <hr>       
        <form>
            <input id="_token" type="hidden" name="_token" value="{{csrf_token()}}">
            <ul class="list-group">
                @foreach($albums as $album)
                    <li class="list-group-item d-flex justify-content-between">
                        ({{$album->id}}) {{$album->album_name}}
                        <div>
                            @if($album->album_thumb)
                            <img class="img-thumbnail" style="width:50px" src="{{asset($album->path)}}" title="{{$album->album_name}}" alt="{{$album->album_name}}">
                            @endif
                            <a href="/albums/{{$album->id}}/edit" class="btn btn-info">UPDATE</a>
                            <a href="/albums/{{$album->id}}" class="btn btn-danger">DELETE</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>
        
    </div> <!-- /.row -->
</div> <!-- /.albums -->

@endsection

@section('script')

    <script>

        $('document').ready(function () {

            $('div.alert').fadeOut(3000);

            $('ul').on('click', 'a.btn-danger',function (ele) {
                ele.preventDefault();
                var urlAlbum =   $(this).attr('href');
                var li = ele.target.parentNode.parentNode;
                $.ajax(
                    urlAlbum,
                    {
                        method: 'DELETE',
                        data:{
                           _token:$('#_token').val()
                        },
                        complete : function (resp) {
                            console.log(resp);
                            if(resp.responseText == 1){
                                li.parentNode.removeChild(li);
                            } else {
                                alert('Problem contacting server');
                            }
                        }
                    }
                )
            });
        });
        
    </script>

@endsection