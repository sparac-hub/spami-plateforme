<table class="table table-bordered">
    <thead>
    <tr>
        <th width="30%">{{ __('og.parameters.name') }}</th>
        <th>{{ __('og.parameters.value') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($current_group as $parameter)
        <tr>
            <td>{{ $parameter->name }}</td>
            <td>{{ $parameter->value }}</td>
        </tr>
    @endforeach
    </tbody>
</table>