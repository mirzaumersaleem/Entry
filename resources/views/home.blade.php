@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <table class="table table-stripe">
                        <tr>
                            <th>ID:</th>
                            <th>Creater Id:</th>
                            <th>Cource</th>
                            <th>Question Lent</th>
                            <th>Unidue-id</th>
                            <th>Time</th>

                        </tr>

                        <tbody>
                            @foreach ($examinfo as $examinfolist)
                            
                            <tr>
                                <td>{{ $examinfolist->id }}</td>
                                <td>{{ $examinfolist->Teacher_id }}</td>
                                <td>{{ $examinfolist->Course }}</td>
                                <td>{{ $examinfolist->question_lenth }}</td>
                                <td>{{ $examinfolist->uniqueid }}</td>
                                <td>{{ $examinfolist->time }}</td>

                            </tr>

                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
