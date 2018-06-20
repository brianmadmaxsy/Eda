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
                    <td><a href="commands/{{ $command->id }}">{{ $command->id }}</a></td>
                    <td>{{ $command->command_order }}</td>
                    <td>{{ $command->command_response }}</td>
                    <td>{{ $command->is_command }}</td>
                    <td>{{ $command->created_at }}</td>
                    <td>{{ $command->updated_at }}</td>
                    <td><a href="commands/{{ $command->id }}/edit" class="btn btn-primary">Update</a></td>
                    <td><a href="commands/{{ $command->id }}/delete" class="btn btn-warning" onclick="return confirm('Delete command {{ $command->id }}?')">Remove</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    {{ $commands->links() }}
    <a href="/commands/create" class="btn btn-info">Add Command</a>
</div>
@endsection
