<ul class="nav nav-tabs tabs-left album">
    <li {!! Route::is('ourstory') || Route::is('add.ourstory') || Route::is('edit.ourstory')? "class='active'" : '' !!}><a href="{{ url('/couple-dashboard-our-story-list/1') }}">Our Story</a></li>
    <li {!! Route::is('ceremony') || Route::is('add.ceremony') || Route::is('edit.ceremony')? "class='active'" : '' !!}><a href="{{ url('/couple-dashboard-wedding-ceremony-list') }}">Wedding Ceremony</a></li>
    <li {!! Route::is('group_list') || Route::is('add.group_list') || Route::is('edit.group_list')? "class='active'" : '' !!}><a href="{{ url('/couple-dashboard-wedding-group-list') }}">Lovable Family</a></li>
    <li  {!! Route::is('wedding-blog') || Route::is('add.wedding-blog') || Route::is('edit.wedding-blog')? "class='active'" : '' !!}><a href="{{ url('/couple-dashboard-wedding-blog-list') }}">Wedding Blog</a></li>
</ul>