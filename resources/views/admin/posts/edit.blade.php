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
            <form action="{{ route('admin.posts.update', $admin_post) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="field">
                    <label class="label" for="name">Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" name="name" id="name" class="input" value="{{ old('name', $admin_post->name) }}"> 
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
                                <input type="text" name="slug" id="slug" class="input" value="{{ old('slug', $admin_post->slug) }}" readonly> 
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
                                    <option value="{{ $category->id }}" {{ $category->id == $admin_post->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
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
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $admin_post->tags->pluck('id')->toArray())) ? ' checked' : '' }}>
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
                                    <input type="radio" name="status" value="1" {{ $admin_post->status == 1 ? 'checked' : '' }}>
                                    <span class="check"></span>
                                    <span class="control-label">Borrador</span>
                                </label>
                            </div>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="status" value="2" {{ $admin_post->status == 2 ? 'checked' : '' }}>
                                    <span class="check"></span>
                                    <span class="control-label">Publicado</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="grid grid-cols-2 ">
                        <div>
                            @if ($admin_post->image)
                                <img id="picture" class="w-96 h-96 object-cover object-center" src="{{ Storage::url($admin_post->image->url) }}" alt=""> 
                            @else
                                <img id="picture" class="w-96 h-96 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/07/07/13/29/bern-7307196_960_720.jpg" alt="">
                            @endif
                        </div>
                        <div>
                            <div class="field">
                                <label class="label">Imagen que se mostrará en el post</label>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input type="file" name="file" id="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('file')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative mt-2" role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptatibus sapiente nulla omnis porro blanditiis? 
                                Saepe distinctio nesciunt assumenda, ipsam sit numquam excepturi omnis aliquam, repellendus eveniet amet eos sequi!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="extract">Extracto</label>
                    <div class="control">
                        <textarea class="textarea" name="extract" id="extract">{{ $admin_post->extract }}</textarea> 
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
                        <textarea class="textarea" name="body" id="body">{{ $admin_post->body }}</textarea> 
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
                        <button type="submit" class="button green">Actualizar Post</button>
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

        // Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event)
        {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            }

            reader.readAsDataURL(file);
        }
    </script>
@endpush