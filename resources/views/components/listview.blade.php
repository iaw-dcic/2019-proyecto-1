<div class="wrapper">
	<div id="formContent">
		<div class="userinfo">
			<img class="img-circle" src="{{asset($user->image)}}" />
			<span class="username">
				<a href="/profile/{{$user->username}}">{{$user->username}}</a>
			</span>
		</div>
		@if(Auth::check() && Auth::user()->id == $user->id)
			<form method="POST" action="/{{Auth::user()->username}}/myLists/{{ $list->id }}">
				@method('DELETE')
				@csrf
				<button type="submit"> Delete </button>
			</form>
		@endif
		<span>{{$list->list_name}}</span>
		<div class="items">
			@foreach ($list->items as $item)
				<div>
					<div class="priority priority-{{$item->priority}}"></div>
					<span  class="item-name" data-toggle="tooltip" data-placement="right" title="{{$item->description}}">
						{{$item->name}}
					</span>
				</div>
			@endforeach
		</div>
	</div>
</div>
