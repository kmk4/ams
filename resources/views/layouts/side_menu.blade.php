<ul class="nav navbar-nav side-nav">
				@foreach ($items->sortBy('order') as $menu_item)
					<li>
					
						
						@php 
							
							$submenu = $menu_item->children;
							$hschild=$menu_item->children->isEmpty();
							
						@endphp
						
						@if($hschild)
							
							
							<a href="{{$menu_item->url}}"><i class="{{$menu_item->icon_class}}"></i> {{$menu_item->title}}</a>	
						@else
							<a href="javascript:;" data-toggle="collapse" data-target="#mnu_{{$menu_item->id}}"><i class="{{$menu_item->icon_class}}"></i> {{$menu_item->title}} <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="mnu_{{$menu_item->id}}" class="collapse">
						
							
								@foreach ($submenu as $item)
								
									<li> <a href="{{$item->url}}"> <i class="{{$item->icon_class}}"></i>
									{{$item->title}}</a></li>
								@endforeach
							</ul>
						
						
						@endif
					</li>
				@endforeach
                    
                   
                   
       
					
					
                </ul>