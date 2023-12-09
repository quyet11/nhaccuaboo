<!DOCTYPE html>
<html lang="en">
  <head>
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
                    <h1 class="font">Add mucsic</h1>

                    <form action="{{('/add_music')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="div_design">
                        <label>Music Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" >
                    </div>

                    <div class="div_design">
                        <label>Artist</label>
                        <input class="text_color" type="text" name="artist" placeholder="Write a Artist" >
                    </div>
                    <div class="div_design">
                        <label>Genre</label>
                        <select class="text_color" name="genre" required="">
                            <option value="" selected>Add a genre here</option>
                            @foreach($song as $song)
                            <option value="{{$song->song_name}}"> {{$song->song_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label>Imange</label>
                        <input  type="file" name="image" accept=".jpg" required="">
                    </div>
                    <div class="div_design">
                        <label>Audio</label>
                        <input  type="file" name="file_path" accept="audio/*" required="">
                    </div>
                    <div class="div_design">

                        <input  type="submit" value="Add Music" class="btn btn-primary">
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
