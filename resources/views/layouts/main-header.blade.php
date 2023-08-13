@if(Auth::guard('web')->check())
    @include("layouts.header-side.admin")

@elseif(Auth::guard('teacher')->check())
    @include("layouts.header-side.teacher")
@elseif(Auth::guard('student')->check())
    @include("layouts.header-side.student")
@endif

