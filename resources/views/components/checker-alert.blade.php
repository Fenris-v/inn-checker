<div class="alert alert-{{ $getClass() }}">
    @if(isset($result['code']))
        <strong>{{ $result['status'] }} - {{ $result['code'] }}</strong><br>
    @endif
    {{ $result['message'] ?? __('general.unknown_error') }}
</div>
