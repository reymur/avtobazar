
<div class="col-lg-4  col-md-4 col-sm-6 mb-3 border-bottom">
    <a href="">
        <table class="d-inline-flex pb-1">
            <thead>
            <th>
                <img class="avto__small_logo mr-4"
                     src="{{ asset('images/cars/image/'. $car->title) }}" alt="Logo">
            </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span class="">
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
</div>
