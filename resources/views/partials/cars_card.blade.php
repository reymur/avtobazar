
<a href="{{ route('models',['name' => $car->title]) }}" class="outline__none">
    <table class="d-inline-flex pb-1 ml-xl-5 ml-lg-5 ml-md-3 ml-sm-3">
        <thead>
            <th class="ml-5">
                <img class="avto__small_logo mr-4"
                     src="{{ asset('images/cars/image/'. $car->image) }}" alt="Logo">
            </th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <span>
                        <span class="row avto__small_text">
                            {{ $car->name }}
                        </span>
                        <span class="row mt-n2">
                            12323
                        </span>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</a>
