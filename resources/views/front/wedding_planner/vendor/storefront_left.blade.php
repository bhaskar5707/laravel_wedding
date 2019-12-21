<ul class="storefront">
      <li class="{{ Request::is('storefront-business') ? 'active' : '' }}"><a href="{{ url('/storefront-business') }}">Business Information</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-location') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-location') }}">Location & Map</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-faq') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-faq') }}">FAQ'S</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-promotion') || Request::is('vendor-dashboard-storefront-promotion-add-promotion') || Request::is('vendor-add-promotion') || Request::is('vendor-dashboard-storefront-promotion-edit-promotion') || Request::is('vendor/promotion/edit/*') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-promotion') }}">Promotions</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-photos') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-photos') }}">Photos</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-videos') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-videos') }}">Videos</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-events') || Request::is('vendor-dashboard-storefront-events-view') || Request::is('vendor-dashboard-storefront-events-edit') || Request::is('vendor-create-event') || Request::is('vendor-create-event') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-events') }}">Events</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-preferred-business') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-preferred-business') }}">Preferred Business</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-social-networks') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-social-networks') }}">Social Networks</a></li>
      <li class="{{ Request::is('vendor-dashboard-storefront-advertisement') ? 'active' : '' }}"><a href="{{ url('/vendor-dashboard-storefront-advertisement') }}">Advertisement</a></li>
      <li class="{{ Request::is('vendor/storefront/availablility') ? 'active' : '' }}"><a href="{{ url('/vendor/storefront/availablility') }}">Availablility</a></li>
      @if(Auth::guard('vendor')->user()->category_id == 14)
      <li class="{{ Request::is('vendor/real-wedding') || Request::is('vendor/real-wedding/form') || Request::is('vendor/real-wedding/form/step2') ? 'active': '' }}"><a href="{{ url('vendor/real-wedding') }}">Real Wedding</a></li>
      @endif
      <li class="{{ Request::is('vendor-blog') || Request::is('vendor-add-blog') || Request::is('vendor-blogs-edit') || Request::is('vendor-blogs-list') ? 'active': '' }}"><a href="{{ url('/vendor-blog') }}">Blogs</a></li>
      
</ul>