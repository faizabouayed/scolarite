@extends('layouts.MenuEnseignant')
@Section('content')
<html>
<head>
    @livewireStyles
</head>
<body>
    <livewire:calendar />
    @livewireScripts
    @stack('scripts')
</body>
</html>
@endsection
