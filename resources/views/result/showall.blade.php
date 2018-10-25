@extends('layouts.app')
@section('content')
<div>
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <table class="table table-stripe">
            <tr>
                <th>Participent Id</th>
                <th>Course Name </th>
                <th>Your Total Mark</th>
                <th>Quilified</th>
            </tr>

            <tbody>
                <tr>
                    <td>{{ $studentId}}</td>
                    <td>{{ $course }}</td>
                    <td>{{ $getScore}}</td>
                    <td>
                            @if($getScore >= 8 ) <span style="color:green;">Yes</span> @else <span style="color:red;">No</span> @endif
                    </td>
                </tr>
            </tbody>
        </table>
    
        {{-- <h2>Participent Id :{{ $studentId}}</h2>
        <h2>Course Name :{{ $course }} </h2>
        <h3 >Your Total Mark : {{ $getScore}} <b><span style="color: green"> @if($getScore == 1) Quilified @endif</span></b></h3> --}}

    </div><hr>
        @foreach($answeredQuestion as $answerQ)
            
            <div class="col-md-2 col-lg-8 col-sm-6 col-lg-offset-4">
                <h3><span style="color: blue">Question : </span> {{$answerQ->question}} ?</h3>
                <div class="col-lg-offset-2">  
                    <div class="form-group">
                        @if($answerQ->given_answer == $answerQ->true_answer)
                        <h4 type="text" name="given_answer" style="color:green;">Your Answer : {{ $answerQ->given_answer }}</h4>
                        @else
                            <h4 type="text" name="given_answer" style="color:red;">Your Answer : {{ $answerQ->given_answer }}</h4>

                        
                        @endif
                    </div>
                     <div class="form-group">
                        <p type="text" name="true_answer"><span style="color:lime;"><b>Right Answer : {{ $answerQ->true_answer }}</b></span></p>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

@endsection
