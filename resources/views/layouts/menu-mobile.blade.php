<div class="app-footer border-0 shadow-lg bg-primary-gradiant">
    <a href="/" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
    <a href="/presensi" class="nav-content-bttn" data-tab="chats"><i class="feather-user-check"></i></a>
    @if (Auth::user()->anggota)
        @can('event read')
            <a href="/organisasi/{{ Auth::user()->anggota->organisasi->uuid }}" class="nav-content-bttn" data-tab="chats"><i class="feather-globe"></i></a>
        @endcan
        @can('keuangan read')
            <a href="/keuangan?kode={{ Auth::user()->anggota->organisasi->uuid }}" class="nav-content-bttn" data-tab="chats"><i class="feather-dollar-sign"></i></a>
        @endcan
    @endif
    <a href="/user/{{ encrypt(Auth::user()->id) }}" class="nav-content-bttn"><img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user" class="w30 shadow-xss rounded-circle"></a>
</div>
