@extends('layout.index')
@section('content')
<div class="col-md-12 main middleWrap">
    <div class="row">
        <div class="col-md-4">
            <a href="{{url('/new')}}" class="btn btn-large btn-primary">Add New Movie</a>
        </div>
    <div class="row">
        <h1>Movies List</h1>
        <div class="midDivWrap">
            <?php
            foreach($movie as $row) { ?>
            <div class="col-md-6 mB20">
                <div class="mvCont">
                    <h3><a href="{{url('/view/'.$row->id)}}">{{$row->name}}</a></h3>
                    <p>{{Str::words($row->review,10)}}</p>
                    <a href="{{url('/edit/'.$row->id)}}">Edit</a>
                </div>
            </div>
            <?php } ?>
            </div>
    </div>
</div>
@stop