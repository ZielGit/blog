<div class="card has-table">
    <header class="card-header">
        <p class="card-header-title">
            <input wire:model="search" type="text" class="input" placeholder="Ingrese el nombre de un posts"> 
        </p>
    </header>

    @if ($posts->count())
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $admin_post)
                        <tr>
                            <td>{{ $admin_post->id }}</td>
                            <td>{{ $admin_post->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $admin_post) }}" class="button blue">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $admin_post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="button red">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <dib class="buttons">
                        {{ $posts->links() }}
                    </dib>
                </div>
            </div>
        </div>
    @else
        <div class="card-content">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif
    
</div>
