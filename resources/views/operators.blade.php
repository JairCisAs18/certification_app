<x-app-layout>
    <button class="btn btn-primary" onclick="window.location.href=' {{ route('addOperatorView') }} '">Agregar operador</button><br><br><br>
    @foreach ($areas as $a)
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{$a->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$a->id}}">{{$a->NAME}}</a><br><br>
        <div class="collapse" id="collapseExample{{$a->id}}">
            <div class="card card-body">
                <table class="table">
                    <thead class="table-primary">
                        <th class="text-center fs-6">NÓMINA</th>
                        <th class="text-center fs-6">NOMBRE</th>
                        <th class="text-center fs-6">EDAD</th>
                        <th class="text-center fs-6">FECHA DE NACIMIENTO</th>
                        <th class="text-center fs-6">FECHA DE INGRESO</th>
                        <th class="text-center fs-6">ÁREA</th>
                        <th class="text-center fs-6">CATEGORÍA</th>
                        <th class="text-center fs-6">FOTO</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($a->getOperatorsByArea() as $op)
                            <tr>
                                <td class="text-center align-middle fs-6">{{$op->EMPLOYEE_ID}}</td>
                                <td class="text-center align-middle fs-6">{{$op->NAME}}</td>
                                <td class="text-center align-middle fs-6">{{$op->AGE}}</td>
                                <td class="text-center align-middle fs-6">{{$op->BIRTHDATE}}</td>
                                <td class="text-center align-middle fs-6">{{$op->HIRING_DATE}}</td>
                                <td class="text-center align-middle fs-6">{{$op->getArea()}}</td>
                                <td class="text-center align-middle fs-6">{{$op->getCategory()}}</td>
                                <td class="text-center align-middle fs-6">
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
            </div>
        </div>
    @endforeach
</x-app-layout>