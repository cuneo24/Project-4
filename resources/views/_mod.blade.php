<div class='modWrapper'>
    <img class='modImg' src='{{$mod->picture_url}}' alt='Mod image for {{$mod->name}}'>
    <a href='{{'/' . $mod->id}}'><span class='modName'>{{$mod->name}}</span></a>
    <div class='modDescription'>
        <hr>
        @if(strlen($mod->description) < 265)
            {{$mod->description}}
        @else
            {{substr($mod->description, 0, 262) . '...'}}
        @endif
    </div>

    <hr id='specHr'>
    <div class='modContent'>
        <em>By {{$mod->mod_author}}</em><br>
        Contributed by <em>{{$mod->user->name}}</em><br>
        <a href='{{$mod->mod_url}}' target="_blank">Download from Skyrim Nexus</a><br>

        @if(isset($user) && $user->name == $mod->user->name)
            <form class='edit' method='GET' action='/{{$mod->id}}/edit'>
                <input type='submit' value='Edit'>
            </form>
            <form class='edit' method='POST' action='/{{$mod->id}}/delconfirm'>
                {{ csrf_field() }}
                <input type='submit' value='Delete'>
            </form>
        @endif

    </div>
</div>