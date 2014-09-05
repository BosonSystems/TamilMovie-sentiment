@extends('layout.index')

@section('content')
<div class="col-md-12 main middleWrap">
    <div class="row">
        <div class="row">
            <h1>Add Movie</h1>
        </div>
        <div class="row">
            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="inputName" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputImg" class="control-label col-xs-2">Image</label>
                    <div class="col-xs-10">
                        <input type="file" class="form-control" id="inputImg" name="image" placeholder="Image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputReview" class="control-label col-xs-2">Review</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" rows="15" name="review"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
