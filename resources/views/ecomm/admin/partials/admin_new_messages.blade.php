<li class="xn-icon-button pull-right">
<a href="#"><span class="fa fa-comments"></span></a>
<?php $messages = App\Message::where('approved', '=' , 0)->get(); ?>
    <div class="informer informer-danger">{{$messages->count()}}</div>
    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging ui-draggable">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><span class="fa fa-comments"></span><a href="{{route('admin_message')}}"> Messages</a></h3>                                
            <div class="pull-right">           
                <span class="label label-danger">             
                {{$messages->count()}} new             
                </span>
            </div>
        </div>
        <div class="panel-body list-group list-group-contacts scroll mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" style="height: 200px;"><div tabindex="0" id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"><div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
        @foreach($messages->take(5) as $message)
        <?php $users = App\User::where('id', '=' , $message->user_id)->get(); ?>
        <?php $profiles = App\Profile::where('user_id', '=', $message->user_id )->get(); ?>
        @foreach($users as $user)
        @foreach($profiles as $profile)
            <a href="{{route('admin_message')}}" class="list-group-item">                
                <img src="{{asset($profile->avatar)}}" class="pull-left" alt="{{$user->first_name}}">
                <span class="contacts-title">{{$user->first_name}}  {{$user->last_name}}</span>
                <p>{{$message->message}}</p>
            </a>
        @endforeach            
        @endforeach
        @endforeach
        </div><div style="display: none;" id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 165px; max-height: 190px;" oncontextmenu="return false;"><div style="line-height: 30px;" class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>     
        <div class="panel-footer text-center">
            <a href="{{route('admin_message')}}">Show all messages</a>
        </div>                            
    </div>                        
</li>