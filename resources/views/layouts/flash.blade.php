@if ($message = Session::get('success'))
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 w-full">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{$message}}</strong>
    </div>
@endif

{{-- MESSAGE ERRORS  (à choisir entre ce message sous forme de liste ou les messages d'erreurs en dessous de l'input) 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{  $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}