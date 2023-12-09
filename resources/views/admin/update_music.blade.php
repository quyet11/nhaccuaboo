<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;


    }
    .font{
        font-size: 40px;
        padding-bottom: 40px;
        color: pink;
    }
    .text_color{
        color: #000;
        padding-bottom: 20px;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
    }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h1 class="font">Update Mucsic</h1>

                    <form action="{{url('/update_music_confirm',$music->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="div_design">
                        <label>Music Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" value="{{$music->title}}">
                    </div>

                    <div class="div_design">
                        <label>Artist</label>
                        <input class="text_color" type="text" name="artist"
                         placeholder="Write a Artist" value="{{$music->artist}}">
                    </div>
                    <div class="div_design">
                        <label>Genre</label>
                        <select class="text_color" name="genre" required="">
                            <option value="{{$music->genre}}" selected="">{{$music->genre}}</option>
                            @foreach($song as $song)
                            <option value="{{$song->song_name}}"> {{$song->song_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="div_design">
                        <label>Currert Imange</label>
                        <img style="margin: auto" height="100" width="100" src="/music/{{$music->image}}" alt="">
                    </div>


                    <div class="div_design">
                        <label>Change Imange</label>
                        <input  type="file" name="image" accept=".jpg" required="">
                    </div>

                    <div class="div_design">
                        <label>Currert Audio</label>
                        <audio style="margin:auto;margin-bottom:10px" controls class="audio">
                            <source src="/music/{{$music->file_path}}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>


                    <div class="div_design">
                        <label>Audio</label>
                        <input  type="file" name="file_path" accept="audio/*" required="">
                    </div>


                    <div class="div_design">

                        <input  type="submit" value="Update Music" class="btn btn-primary">
                    </div>
                </form>

                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
