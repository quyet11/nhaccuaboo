<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
    .center{
        margin: auto;
        width: 100%;
        border: 2px solid palevioletred;
        margin-top: 40px;
    }
    .image{


        padding-top:8px ;
    }
    .image2{
        width: 100px;
        height: 100px;
        border-radius: 100%;
        padding-bottom: 3px;
    }
    .hello{
        width: 130px;
    }

   .audio {
        width: 200px; /* Adjust the width to your desired value */

    }
    .ha{
        background: palevioletred;
        height: 50px;
        color: black;

    }
    #ba{
        padding-left: 10px;
    }
    .fo{
        color: palevioletred;
        text-align: center;
        font-size:25px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

    }
    .cha{
        color: palevioletred;
    }
    .cha .audio{
        color: palevioletred;

    }
    .rotate {
        animation: rotateAnimation 2s linear infinite; /* Adjust the duration and timing function as needed */
    }

    @keyframes rotateAnimation {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    .center .fo.ha.hii{
        padding-right: 100px;
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
                <h2 class="fo">All Music</h2>
                <table class="center">
                    <tr class="ha">
                        <th class="helloo" id="ba">Title</th>
                        <th class="hello">Artist</th>
                        <th class="hello">Genre</th>
                        <th class="hi" style="padding-left: 70px">Audio</th>
                        <th class="hii">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Image</th>




                                    <th>Delete</th>
                                    <th>Edit</th>


                    </tr>
                    @foreach($music as $music)
                    <tr class="cha" style="border: 2px solid palevioletred">
                        <td style="padding-left: 10px">{{$music->title}}</td>
                        <td>{{$music->artist}}</td>
                        <td>{{$music->genre}}</td>
                        <td  >
                            <audio controls class="audio">
                                <source src="/music/{{$music->file_path}}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </td>

                        <td class="image">
                             <img  class="image2" src="/music/{{$music->image}}"id="rotatingImage"></td>


                             <td><a class="del" onclick="return confirm('Are you sure about that?')"

                                href="{{url('delete_music',$music->id)}}">Delete</a></td>
                           <td><a href="{{url('update_music',$music->id)}}" class="edit">Edit</a></td>




                    @endforeach
                </table>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
  <script>
    document.getElementById('musicPlayer').addEventListener('play', function() {
        rotateImage();
    });

    document.getElementById('musicPlayer').addEventListener('pause', function() {
        stopRotation();
    });

    function rotateImage() {
        document.getElementById('rotatingImage').classList.add('rotate');
    }

    function stopRotation() {
        document.getElementById('rotatingImage').classList.remove('rotate');
    }
</script>

</html>
