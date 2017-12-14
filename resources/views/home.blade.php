@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div style="background:#eee;height:200px;margin-bottom:10px;">
    
    </div>
</div>
    <div class="row">
        <div >
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    All courses appears here
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
