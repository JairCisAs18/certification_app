<form action="{{ route('addOperator') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="userId" value="{{$userId}}">
    @csrf
    <select name="area" id="">
        @foreach ($areas as $a)
            <option value="{{$a->id}}">{{$a->NAME}}</option>
        @endforeach
    </select>
    <label for="employee_id">Número de nómina</label>
    <input type="number" name="employee_id">
    <br>
    <label for="name">Nombre:</label>
    <input type="text" name="name">
    <br>
    <label for="age">Edad:</label>
    <input type="number" name="age">
    <br>
    <label for="birthdate">Fecha de Nacimiento: </label>
    <input type="text" name="birthdate" placeholder="Ej. 2001-06-18">
    <br>
    <label for="category">Categoría: </label>
    <input type="text" name="category">
    <br>
    <label for="photo">Foto: </label>
    <input type="file" name="photo">
    <br>
    <input type="submit" name="input-button" value="Registrar">
</form>