@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$permission->name ?? old('name')}}" >
</div>
<div class="form-group">
    <label for="">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{$permission->description ?? old('description')}}">
</div>
