@extends('layouts.app')

@section('content')
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" />

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
   
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container" style="margin-top: 30px;">

<div class="box">
    <div class="title"> @foreach ($projects as $project)
                         <p>{{$project->title}}</p>
                    @endforeach</div>
</div>
</div>
@endsection

