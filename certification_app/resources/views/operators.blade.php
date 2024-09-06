<x-app-layout>
    <button onclick="window.location.href=' {{ route('addOperatorView') }} '">Agregar operador</button>
    <table>
        <thead>
            <th>NÓMINA</th>
            <th>NOMBRE</th>
            <th>EDAD</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>CATEGORÍA</th>
            <th>FOTO</th>
        </thead>
        <tbody>
            @foreach ($operators as $op)
                <tr>
                    <td>{{$op->EMPLOYEE_ID}}</td>
                    <td>{{$op->NAME}}</td>
                    <td>{{$op->AGE}}</td>
                    <td>{{$op->BIRTHDATE}}</td>
                    <td>{{$op->CATEGORY}}</td>
                    <td>
                        @if($op->PHOTO)
                            <img src="{{asset ('storage/photos/' . $op->PHOTO)}}" alt="" width="50px" height="50px">
                        @else
                            No tiene foto
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>