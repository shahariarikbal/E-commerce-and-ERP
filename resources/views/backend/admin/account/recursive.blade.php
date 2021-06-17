@if ($root->children->count() > 0)
<ul>
    @foreach ($root->children as $child)
      <li>
        <span class="block1">{{ $child->name}}</span>
        <span class="block2">{{ $child->opening_balance}}</span>
        <span class="block2">{{ $child->balance}}</span>

        @if ($child->children->count() > 0)
        	@include('backend.admin.account.recursive', ['root' => $child])
        @endif

      </li>
    @endforeach
</ul>
@endif