@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="/admin/upload-car-images/{{$carDetails->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    Car model:
    <br />
    <input type="text" name="id_car_image" value="{{ $carDetails->id }}"/>
    <br /><br />
    <input type="text" name="name_car_image" value="{{ $carDetails->model }}"/>
    <br /><br />
    Car Images (can attach more than one):
    <br />
    <input type="file" name="images[]" multiple />
    <br /><br />
    <input type="submit" value="Upload" />
</form>