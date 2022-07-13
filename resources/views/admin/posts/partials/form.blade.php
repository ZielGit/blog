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
    <div class="grid grid-cols-2 ">
        <div>
            <img id="picture" class="w-96 h-96 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/07/07/13/29/bern-7307196_960_720.jpg" alt="">
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