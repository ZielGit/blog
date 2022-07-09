@extends('layouts.master')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Lista de Posts</li>
        </ul>
        <a href="{{ route('admin.posts.create') }}" class="button blue">
            <span>Agregar Post</span>
        </a>
    </div>
</section>

<section class="section main-section">
    @livewire('admin.posts-index')
</section>
@endsection