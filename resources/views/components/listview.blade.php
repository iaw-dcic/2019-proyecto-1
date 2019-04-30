<div class="wrapper">
	<div id="formContent">
		<div class="userinfo">
			<img class="img-circle" src="{{asset('storage/images/'.$user->image)}}" />
			<span class="username">
				<a href="/profile/{{$user->username}}">{{$user->username}}</a>
			</span>
			<span class="text-muted">
			@if($list->public)
				(public)
			@else
				(private)
			@endif
			</span>
			<span id="editlink">
				@if(Auth::check() && Auth::user()->id == $user->id)
					<a href="/{{Auth::user()->username}}/myLists/{{$list->id}}/edit">
						<i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="right" title="edit list"></i>
					</a>
				@endif
			</span>
		</div>
		<div id="list-info">
			<span class="list-title">{{$list->list_name}}</span>
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
			@if(Auth::check() && $list->public)
				<div id="likes">
					<a id="like-button" lista="{{$list->id}}"><i class="glyphicon glyphicon-thumbs-up"></i></a>
					<span id="likes-number">{{count($list->likes)}} </span> likes
				</div>
			@endif
		</div>
	</div>
</div>
<script src="{{ asset('js/posts.js') }}" defer></script>
