@csrf
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$detail->name ?? old('name')}}" >
</div>

