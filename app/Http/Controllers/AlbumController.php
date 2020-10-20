<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qb = DB::table('albums')->orderBy('id','DESC');
        
        if($request->has('id')){
            $qb->where('id',$request->input('id'));
        }

        if($request->has('album_name')){
            $qb->where('album_name','like','%'.$request->input('album_name').'%');
        }
        
        $albums = $qb->get();

        return view('albums.albums', compact('albums'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = DB::table('albums')->insert(
            [
                'album_name' => request()->input('albumname'),
                'album_description' => request()->input('albumdescription'),
                'user_id' => 1,
                'album_thumb' => 'https://designshack.net/wp-content/uploads/placeholder-image.png'
            ]
        );
        
        $name = request()->input('albumname');
        $mess = $res ? 'Album '.$name.' created' : 'Error creating album';

        session()->flash('message',$mess);
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = 'select * FROM albums WHERE id=:id';
        return  DB::select($sql, ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sql = 'SELECT album_name, album_description, id FROM albums WHERE id=:id';
        $album = DB::select($sql,['id'=>$id]);
        return view('albums.edit')->withAlbum($album[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $res = DB::table('albums')->where('id',$album->id)
        ->update(
            [
                'album_name' => request()->input('albumname'),
                'album_description' => request()->input('albumdescription')
            ]
        );

        $mess = $res ? 'Album '.$album->id.' updated' : 'Error updating album';

        session()->flash('message',$mess);
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $res = DB::table('albums')->where('id',$album->id)->delete();
        return $res;
    }

}
