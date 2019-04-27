<ul>
@foreach ($lists as $list)
	@component('components.listview', ['user' => $list->user,
		'list' => $list])
	@endcomponent
@endforeach
</ul>
