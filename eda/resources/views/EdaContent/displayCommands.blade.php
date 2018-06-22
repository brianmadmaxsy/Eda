@extends('EdaLayout.master')

@section('content')

<div class="container">
    <div class="row">
        <h2>Eda's Commands</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order</th>
                    <th scope="col">Response</th>
                    <th scope="col">Is Command</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Modified</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($commands as $command)
                {
                ?>
                <tr>
                    <td><a href="commands/{{ $command->command_id }}">{{ $command->command_id }}</a></td>
                    <td>{{ $command->cmd_order_text }}</td>
                    <td>{{ $command->cmd_response_text }}</td>
                    <td>{{ $command->is_command }}</td>
                    <td>{{ $command->status }}</td>
                    <td>{{ $command->created_at }}</td>
                    <td>{{ $command->updated_at }}</td>
                    <td><a href="commands/{{ $command->command_id }}/edit" class="btn btn-primary">Update</a></td>
                    <td><a href="commands/{{ $command->command_id }}/delete" class="btn btn-warning" onclick="return confirm('Delete command {{ $command->command_id }}?')">Remove</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    {{ $commands->links() }}
    <a href="/commands/create" class="btn btn-info">Add Command</a>
    <a href="/commands/create" class="btn btn-info">Add Order</a>
    <a href="/commands/create" class="btn btn-info">Add Response</a>
</div>
@endsection
