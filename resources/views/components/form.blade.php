@props(['method' => 'POST', 'action' => ''])

<form method="{{ $method === 'GET' ? 'GET' : 'POST' }}" action="{{ $action }}" {{ $attributes }}>
  @if($method !== 'GET')
    @csrf
  @endif
  
  @if($method !== 'POST' && $method !== 'GET')
    @method($method)
  @endif

  {{ $slot }}
</form>
