<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            <b class="font-black">Blog</b>
        </div>
    </div>
    <div class="menu is-menu-main">
      	<p class="menu-label">General</p>
		<ul class="menu-list">
			<li class="active">
				<a href="{{ route('admin.home') }}">
					<span class="icon"><i class="mdi mdi-view-dashboard"></i></span>
					<span class="menu-item-label">Dashboard</span>
				</a>
			</li>
		</ul>
      	<p class="menu-label">Administrador</p>
		<ul class="menu-list">
			<li class="--set-active-tables-html">
				<a href="{{ route('admin.categories.index') }}">
					<span class="icon"><i class="mdi mdi-buffer"></i></span>
					<span class="menu-item-label">Categorias</span>
				</a>
			</li>
			<li class="--set-active-forms-html">
				<a href="{{ route('admin.tags.index') }}">
					<span class="icon"><i class="mdi mdi-tag-outline"></i></span>
					<span class="menu-item-label">Etiquetas</span>
				</a>
			</li>
		</ul>
		<p class="menu-label">Opciones de Blog</p>
		<ul class="menu-list">
			<li class="--set-active-profile-html">
				<a href="{{ route('admin.posts.index') }}">
					<span class="icon"><i class="mdi mdi-clipboard"></i></span>
					<span class="menu-item-label">Lista de post</span>
				</a>
			</li>
			<li class="--set-active-profile-html">
				<a href="{{ route('admin.posts.create') }}">
					<span class="icon"><i class="mdi mdi-file"></i></span>
					<span class="menu-item-label">Crear nuevo post</span>
				</a>
			</li>
		</ul>
    </div>
</aside>