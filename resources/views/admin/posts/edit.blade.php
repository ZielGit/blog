@extends('layouts.master')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Editar Post</li>
        </ul>
    </div>
</section>

<section class="section main-section">
    <div class="card mb-6">
        <div class="card-content">
            <form action="{{ route('admin.posts.update', $post) }}" method="post">
                @csrf
                @method('put')
                <div class="field">
                    <label class="label" for="name">Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" name="name" id="name" class="input" value="{{ old('name', $post->name) }}"> 
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="slug">Slug</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" name="slug" id="slug" class="input" value="{{ old('slug', $post->slug) }}" readonly> 
                            </div>
                        </div>
                    </div>
                    @error('slug')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <hr>
                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green">Actualizar Etiqueta</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('admin.posts.index') }}" class="button red">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection