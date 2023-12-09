
<style>
    .title{
        text-align: center;

        color: palevioletred;
        font-size: 18px;

    }
    .haha{

        padding-top: 20px;
    }
    .he{
        color: palevioletred;

    }
</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>Songs</span>
          </h2>
       </div>
       <div class="row">


        @foreach($music as $musics)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                {{-- <div class="option_container">
                   <div class="options">
                      <a href="{{url('listen',$musics->id)}}" class="option1">
                      Listen
                      </a>

                   </div>
                </div> --}}

                <h5 class="title">
                    <b>{{$musics->title}}</b>
                 </h5>
                <div class="img-box">
                   <img src="music/{{$musics->image}}" alt="">



                </div>
                <audio controls class="audio">
                    <source src="/music/{{$musics->file_path}}" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>

                <div>

                </div>
                <div class="detail-box">

                   <h6>
                    <b class="he" style="">Artist:  {{$musics->artist}}</b>
                   </h6>
                   <h6>
                    <b class="he" style="color: palevioletred">Genre:  {{$musics->genre}}</b>
                   </h6>
                </div>
             </div>
          </div>

    @endforeach
    <span class="haha">
        {!!$music->withQueryString()->links('pagination::bootstrap-5')!!}
    </span>


    </div>
 </section>
