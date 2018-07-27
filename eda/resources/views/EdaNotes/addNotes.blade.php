@extends('EdaLayout.master')

@section('content')
<div class="container">
    <div class="row">
        <h2>Create Note</h2>
        <form method="post" action="/commands">
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input name="note_title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Body</label>
                <textarea name="note_body" id="article-ckeditor" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Save" class="btn btn-info">
            </div>
            <div class="form-group">
                <a href="/commands">Back to Notes</a>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
