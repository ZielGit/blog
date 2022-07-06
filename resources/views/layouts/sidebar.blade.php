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
					<span class="icon"><i class="mdi mdi-tag-outline"></i></span>
					<span class="menu-item-label">Categorias</span>
				</a>
			</li>
			<li class="--set-active-forms-html">
				<a href="forms.html">
					<span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
					<span class="menu-item-label">Forms</span>
				</a>
			</li>
			<li class="--set-active-profile-html">
				<a href="profile.html">
					<span class="icon"><i class="mdi mdi-account-circle"></i></span>
					<span class="menu-item-label">Profile</span>
				</a>
			</li>
			<li>
				<a href="login.html">
					<span class="icon"><i class="mdi mdi-lock"></i></span>
					<span class="menu-item-label">Login</span>
				</a>
			</li>
			<li>
				<a class="dropdown">
					<span class="icon"><i class="mdi mdi-view-list"></i></span>
					<span class="menu-item-label">Submenus</span>
					<span class="icon"><i class="mdi mdi-plus"></i></span>
				</a>
				<ul>
					<li>
						<a href="#void">
							<span>Sub-item One</span>
						</a>
					</li>
					<li>
						<a href="#void">
							<span>Sub-item Two</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
    </div>
</aside>