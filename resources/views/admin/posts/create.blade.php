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
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                
                @include('admin.posts.partials.form')

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