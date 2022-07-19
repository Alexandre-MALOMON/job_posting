@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')
<section class="section-background">
    <div class="container">
    @include('partial.sidebare')

    <livewire:conversation :conversation="$conversation">

</div>
</section>
@endsection
