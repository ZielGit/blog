@extends('layouts.master')
@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Crear Nuevo Post</li>
        </ul>
    </div>
</section>

<section class="section main-section">
    <div class="card mb-6">
        <div class="card-content">
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="field">
                    <label class="label" for="name">Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" name="name" id="name" class="input" value="{{ old('name') }}" placeholder="Ingrese el nombre del post"> 
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
                                <input type="text" name="slug" id="slug" class="input" value="{{ old('slug') }}" placeholder="Ingrese el slug del post" readonly> 
                            </div>
                        </div>
                    </div>
                    @error('slug')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="category_id">Categoria</label>
                    <div class="field-body">
                        <div class="select">
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('category_id')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Etiquetas</label>
                    <div class="field-body">
                        <div class="field grouped multiline">
                            @foreach ($tags as $tag)
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                        <span class="check"></span><span class="control-label">{{ $tag->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                      </div>
                    </div>
                    @error('tags')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Estado</label>
                    <div class="field-body">
                        <div class="field grouped multiline">
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="status" value="1" checked>
                                    <span class="check"></span>
                                    <span class="control-label">Borrador</span>
                                </label>
                            </div>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="status" value="2">
                                    <span class="check"></span>
                                    <span class="control-label">Publicado</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="extract">Extracto</label>
                    <div class="control">
                        <textarea class="textarea" name="extract" id="extract"></textarea> 
                    </div>
                    @error('extract')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="body">Cuerpo del Post</label>
                    <div class="control">
                        <textarea class="textarea" name="body" id="body"></textarea> 
                    </div>
                    @error('body')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <hr>
                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green">Crear Post</button>
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

@push('scripts')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jQuery-Plugin-stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            });

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            });
    </script>
@endpush