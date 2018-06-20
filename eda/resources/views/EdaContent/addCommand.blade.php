@extends('EdaLayout.master')

@section('content')
<div class="container">
    <div class="row">
        <h2>Create Command</h2>
        <form method="post" action="/commands">
            <div class="form-group">
                <label for="exampleFormControlInput1">Your Order</label>
                <input name="command_order" type="text" class="form-control" id="exampleFormControlInput1" placeholder="e.g. 'How are you Eda?', 'Open Wordpad.'" required="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Eda's Response</label>
                <textarea name="command_response" class="form-control" id="exampleFormControlTextarea1" rows="3" required="" placeholder="E.g. 'I am Fine sir, Thank you!', 'wordpad.exe'"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Type</label>
                <select name="is_command" class="form-control" id="sel1" required="">
                    <option value="">Choose Command Type</option>
                    <option value="0">Text</option>
                    <option value="1">Command</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Learn" class="btn btn-info">
            </div>
            <div class="form-group">
                <a href="/commands">Back to Posts</a>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
