<tr>
    <td class="text-left">
{{--        {{ dd( $slug ) }}--}}
        <seller-photo-edit
            :auth_user="{{ Auth::user() }}"
            slug="{{ $slug }}"
        >
        </seller-photo-edit>

    </td>
</tr>
