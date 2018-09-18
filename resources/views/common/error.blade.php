@if (count($errors) > 0)
    <div class="alert alert-danger">
        {{--<p>There were some problems with your input.</p>--}}
        <h4>有错误发生: </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif