@props([
    'action',
    'method',
    'buttonLabel'
])

<form action="{{$action}}" method="{{$method}}">
    {{$slot}}
    <x-button>{{$buttonLabel}}</x-button>
</form>
