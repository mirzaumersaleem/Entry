@extends('layouts.app')

@section('script')

<!-- script for time limitation of exam -->
<script type="text/javascript">
var timeoutHandle;
function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {

            if(mins > 1){

               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);

            }
        }
    }
    tick();
}

countdown('<?php echo $time; ?>');

</script>

<!-- script for disable url -->
<script type="text/javascript">
    var time= '<?php echo $time; ?>';
    var realtime = time*60000;
    setTimeout(function () {
        alert('Time Out');
        window.location.href= '/';},
   realtime);

    
</script>

@endsection




@section('content')
<body style="background-image:url('images/bg3.png');background-repeat: no-repeat;">
    <div>
        <nav class="col-lg-1 pull-left">
          <div class="sidebar-nav-fixed affix">
            <h1><b><span style="color:#3097d1;">Time </span><span id="timer" style="color: red">0.00</span></b></h1><br>
          </div>
        </nav>
        <br>
        <h1 class="col-lg-offset-4" style="color: red;"><span style="background-color:white; color: #3097d1;border-radius: 5px"><b>  Online Test For {{$course}}  </b></span></h1>
        <div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3" >
            {{--  --}}
        @foreach($questions as $question)
            <div class="col-md-10 col-lg-12 col-sm-10 " style="background-color:white;border:5px solid #3097d1 ; margin-bottom:20px;">
                <form method="post" action="{{route('answer.store')}}" class="ansform">
                	{{ csrf_field() }}

                    <h3><b>{{$question->question}}</b></h3>
                    <div class="col-lg-offset-1 group-control">
                        <input type="hidden" name="question" value="{{$question->question}}">
                        <input type="hidden" name="student_id" value="{{$student_id}}">
                        <input type="hidden" name="true_answer" value="{{$question->answer}}">
                        <input name="answer" value="{{$question->choice1}}" type="radio">{{ $question->choice1}}<br>
                        <input name="answer" value="{{$question->choice2}}" type="radio">{{ $question->choice2}}<br>
                        <input name="answer" value="{{$question->choice3}}" type="radio">{{$question->choice3}}<br>
                        <input name="answer" value="{{$question->choice4}}" type="radio">{{$question->choice4}}<br><br>
                        <input type="submit" name="submit" value="submit" class="btn btn-primary" id="submitbtn">
                    </div>
                  <br>
                </form>
                
            </div>
            <br>
        @endforeach

        <a href="{{ url('/') }}" class="btn btn-success pull-right">End Exam</a>
        </div>
    </div>
   
</body>




@endsection

	 
