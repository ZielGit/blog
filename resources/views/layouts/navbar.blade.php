<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
		<a class="navbar-item mobile-aside-button">
			<span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
		</a>
    </div>
    <div class="navbar-brand is-right">
		<a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
			<span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
		</a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
		<div class="navbar-end">
			<div class="navbar-item dropdown has-divider has-user-avatar">
				<a class="navbar-link">
					<div class="user-avatar">
						@if (Auth::user()->profile_photo_path)
							<img class="rounded-full" src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
						@else
							<img class="rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
						@endif
					</div>
					<div class="is-user-name">
						<span>{{ Auth::user()->name }}</span>
					</div>
					<span class="icon"><i class="mdi mdi-chevron-down"></i></span>
				</a>
				<div class="navbar-dropdown">
					<a href="{{ route('profile.show') }}" class="navbar-item">
						<span class="icon"><i class="mdi mdi-account"></i></span>
						<span>My Profile</span>
					</a>
					<a href="#" class="navbar-item">
						<span class="icon"><i class="mdi mdi-settings"></i></span>
						<span>Settings</span>
					</a>
					<hr class="navbar-divider">
					<form action="{{ route('logout') }}" method="post">
						@csrf
						<a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();this.closest('form').submit();">
							<span class="icon"><i class="mdi mdi-logout"></i></span>
							<span>Log Out</span>
						</a>
					</form>
				</div>
			</div>
		</div>
    </div>
</nav>