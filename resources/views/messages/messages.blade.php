@if(Session::has('saveCat'))
    <br>
    <div class="alert alert-info text-center col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3"><b>{{ Session::get('saveCat') }}</b></div>
@endif

@if(Session::has('updateCat'))
    <br>
    <div class="alert alert-info text-center col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3"><b>{{ Session::get('updateCat') }}</b></div>
@endif

@if(Session::has('deleteCat'))
    <br>
    <div class="alert alert-info text-center col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3"><b>{{ Session::get('deleteCat') }}</b></div>
@endif