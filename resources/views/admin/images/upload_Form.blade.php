 <form action="{{ url('/admin/upload-car-images-form') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="control-group">
        <br /><br />
        <label class="control-label">Car Model</label>
        <br /><br />

        <div class="controls">
            <select name="car_id" style="width: 220px">
                <option>Select Car model</option>
                @foreach ($carDetails as $id=>$model)
                    <option value="{{ $id }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>
    </div>
     <br /><br />
    <input type="file" name="images[]" multiple />
    <br /><br />
    <input type="submit" value="Upload" />
</form>

