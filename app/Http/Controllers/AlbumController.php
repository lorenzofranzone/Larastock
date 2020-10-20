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
        //
        $sql = "SELECT * FROM albums WHERE 1=1";
        
        $where = [];
        
        if($request->has('id')){
            $where['id'] = $request->get('id');
            $sql.=" AND id=:id";
        }
        
        if($request->has('album_name')){
            $where['album_name'] = $request->get('album_name');
            $sql.=" AND album_name=:album_name";
        }

        $sql .= ' ORDER BY id DESC';

        $albums = DB::select($sql,$where);
        return view('albums.albums', ['albums'=>$albums]);
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
        $data = request()->only(['albumname','albumdescription']);
        $data['user_id'] = 1;
        $data['album_thumb'] = 'https://designshack.net/wp-content/uploads/placeholder-image.png';
        $sql = 'INSERT INTO albums (album_name, album_description, user_id, album_thumb) ';
        $sql .= 'VALUES(:albumname, :albumdescription, :user_id, :album_thumb) ';
        $res = DB::insert($sql, $data);

        $mess = $res ? 'Album '.$data['albumname'].' created' : 'Error creating album';

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
        $data = request()->only(['albumname','albumdescription']);
        // dd($data);
        $data['id'] = $album->id;
        $sql = ' UPDATE albums SET album_name=:albumname, album_description=:albumdescription';
        $sql .= ' WHERE id=:id';
        $res = DB::update($sql,$data);

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
        $sql = 'DELETE FROM albums WHERE id=:id';
        DB::delete($sql,['id'=>$album->id]);
    }

    /**
     * TEST DELETE
     */
    public function delete(int $album)
    {
        $sql = 'DELETE FROM albums WHERE id=:id';
        return  DB::delete($sql, ['id' => $album]);
    }

}
