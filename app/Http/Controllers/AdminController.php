<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\Music;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=song::all();
        return view('admin.catagory',compact('data'));
    }
    public function add_catagory(Request $request)
    {
        $data= new song;
        $data->song_name=$request->catagory;
        $data->save();

        return redirect()->back()-> with ('message','Genre Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = song::find($id);
        $data -> delete();
        return redirect()->back() -> with('message',"Genre Deleted Successfully");
    }

    public function view_music()
    {
        $song = song::all();
        return view('admin.music',compact('song'));
    }
    public function add_music(Request $request )
    {
        $Music= new Music;
        $Music->title =$request->title;
        $Music->artist =$request->artist;
        $Music->genre =$request->genre;

        // Xử lý tệp hình ảnh
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('Music'), $imagename);
    $Music->image = $imagename;
}

// Xử lý tệp âm thanh
if ($request->hasFile('file_path')) {
    $file_path = $request->file('file_path');
    $file_name = time() . '.' . $file_path->getClientOriginalExtension();
    $file_path->move(public_path('Music'), $file_name);
    $Music->file_path = $file_name;
}






        $Music->save();
        return redirect()->back()->with('message','Mussic Added successfully');
    }
    public function show_music(){
        $music=music::all();
        return view('admin.show_music',compact('music'));
    }
    public function delete_music($id)
    {
        $music=music::find($id);
        $music->delete();
        return redirect()->back() -> with('message',"Music Deleted Successfully");
    }
    public function update_music($id){
        $music=music::find($id);
        $song=song::all();
        return view('admin.update_music',compact('music','song'));


    }
    public function update_music_confirm(Request $request, $id)
{
    $music = Music::find($id);

    if (!$music) {
        return redirect()->back()->with('error', 'Music not found');
    }

    $music->title = $request->title;
    $music->artist = $request->artist;
    $music->genre = $request->genre;

    $image = $request->file('image');
    if ($image) {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('music', $imageName);
        $music->image = $imageName;
    }

    $file_path = $request->file('file_path');
    if ($file_path) {
        $fileName = time() . '.' . $file_path->getClientOriginalExtension();
        $file_path->move('music', $fileName);
        $music->file_path = $fileName;
    }

    $music->save();

    return redirect()->back()->with('message', 'Music updated successfully');
}
public function search(){
    // Kiểm tra xem 'search' có tồn tại trong mảng $_GET không
    $search_text = isset($_GET['search']) ? $_GET['search'] : '';

    // Tiếp tục với xử lý tìm kiếm nếu 'search' tồn tại
    if (!empty($search_text)) {
        $music = Music::where('title', 'LIKE', '%' . $search_text . '%')
        ->orWhere('artist', 'LIKE', '%' . $search_text . '%')
                      ->orWhere('genre', 'LIKE', '%' . $search_text . '%')
                      ->get();
        return view('admin.search', compact('music'));
    } else {
        // Xử lý khi 'search' không tồn tại hoặc trống
        // Ví dụ: Chuyển hướng hoặc hiển thị thông báo lỗi
        return view('admin.search', ['music' => []]); // hoặc có thể sử dụng compact('music')
    }
}

}
