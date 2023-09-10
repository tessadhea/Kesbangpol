<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      KESBANG<b class="font-black">POL</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    @unlessrole('user')
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="{{  Request::is('admin') ? 'active' : '' }}">
        <a href="/admin">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
     
    </ul>
    <p class="menu-label">Account Management</p>
    <ul class="menu-list">
      <li class="{{  Request::is('admin/user') ? 'active' : '' }}">
        <a href="{{ route('admin.user.index') }}">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Akun</span>
        </a>
      </li>
      <li class="{{  Request::is('admin/roles') ? 'active' : '' }}">
        <a href="{{ route('admin.roles.index') }}">
          <span class="icon"><i class="mdi mdi-account-edit"></i></span>
          <span class="menu-item-label">Roles</span>
        </a>
      </li>
      <li class="{{  Request::is('admin/permission') ? 'active' : '' }}">
        <a href="{{ route('admin.permission.index') }}">
          <span class="icon"><i class="mdi mdi-account-key"></i></span>
          <span class="menu-item-label">Permissions</span>
        </a>
      </li>
     
      
      
    </ul>
    @endunlessrole
    <p class="menu-label">Program</p>
    <ul class="menu-list">
      <li class="{{  Request::is('ormas') ? 'active' : '' }}">
        <a href="/ormas" class="has-icon">
          <span class="icon"><i class="mdi mdi-account-group"></i></span>
          <span class="menu-item-label mr-1">Layanan Organisasi Masyarakat</span>
        </a>
      </li>
      <li class="{{  Request::is('ibadah') ? 'active' : '' }}">
        <a href="{{ route('ibadah.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-home-group"></i></span>
          <span class="menu-item-label mr-1">Pendaftaran Rumah Ibadah</span>
        </a>
      </li>
      <li class="{{  Request::is('penelitian') ? 'active' : '' }}">
        <a href="{{ route('penelitian.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-magnify"></i></span>
          <span class="menu-item-label mr-1">Rekomendasi Penelitian</span>
        </a>
      </li>
      <li class="{{  Request::is('keramaian') ? 'active' : '' }}">
        <a href="{{ route('keramaian.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-mail"></i></span>
          <span class="menu-item-label mr-1">Surat Izin Keramaian</span>
        </a>
      </li>
    </ul>
  </div>
</aside>