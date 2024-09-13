<x-app-layout>
    <button class="btn btn-primary" onclick="window.location.href=' {{ route('addOperatorView') }} '">Agregar operador</button>
    <table class="table">
        <thead class="table-primary">
            <th class="text-center fs-4">NÓMINA</th>
            <th class="text-center fs-4">NOMBRE</th>
            <th class="text-center fs-4">EDAD</th>
            <th class="text-center fs-4">FECHA DE NACIMIENTO</th>
            <th class="text-center fs-4">CATEGORÍA</th>
            <th class="text-center fs-4">FOTO</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($operators as $op)
                <tr>
                    <td class="text-center align-middle fs-5">{{$op->EMPLOYEE_ID}}</td>
                    <td class="text-center align-middle fs-5">{{$op->NAME}}</td>
                    <td class="text-center align-middle fs-5">{{$op->AGE}}</td>
                    <td class="text-center align-middle fs-5">{{$op->BIRTHDATE}}</td>
                    <td class="text-center align-middle fs-5">{{$op->CATEGORY}}</td>
                    <td class="text-center align-middle fs-5">
                        @if($op->PHOTO)
                            <img src="{{ asset ('storage/photos/' . $op->PHOTO) }}" alt="" width="80px" height="80px" style="margin: auto;">
                        @else
                            No tiene foto
                        @endif
                    </td>
                    <td class="text-center align-middle fs-5">
                        <button class="btn btn-info" onclick="window.location.href=' {{ route('editOperatorView', $op->id) }} '">Editar</button>
                        <button class="btn btn-danger" onclick="window.location.href=' {{ route('changeToInactive', $op->id) }} '">Dar de baja</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>