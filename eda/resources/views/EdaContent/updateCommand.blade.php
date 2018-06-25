@extends('EdaLayout.master')

@section('content')
<div class="container">
    <div class="row">
        <h2>Update Command ({{ $command->command_id }})</h2>
        <form method="post" action="/commands/{{ $command->command_id }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Your Order</label>
                <input name="command_order" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $command->order->cmd_order_text }}" required="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Eda's Response</label>
                <textarea name="command_response" class="form-control" id="exampleFormControlTextarea1" rows="3" required="">{{ $command->response->cmd_response_text }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Type</label>
                <select name="is_command" class="form-control" id="sel1" required="">
                    <option value="">Choose Command Type</option>
                    <option value="0" <?php echo $command->is_command == 0 ? 'selected' : '' ?>>Text</option>
                    <option value="1" <?php echo $command->is_command == 1 ? 'selected' : '' ?>>Command</option>
                </select>
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <input type="submit" name="save" value="Update" class="btn btn-info">
            </div>
            <div class="form-group">
                <a href="/commands">Back to Posts</a>
            </div>
        </form>
    </div>
</div>
@endsection
