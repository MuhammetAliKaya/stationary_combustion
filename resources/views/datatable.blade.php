@foreach($calculations as $calculation)
<tr class="boxr">
    <td class="boxr">{{ $calculation->facilty_id }}</td>
    <td>{{ $calculation->year }}</td>
    <td>{{ $calculation->fuel }}</td>
    <td>{{ $calculation->amount_of_fuel }}</td>
    <td>{{ $calculation->units }}</td>
    <td>{{ $calculation->CO2 }}</td>
    <td>{{ $calculation->CH4 }}</td>
    <td>{{ $calculation->N2O }}</td>
    <td>{{ $calculation->CO2E }}</td>
    <td class="tableright smw">
        <button class="tabbtn deletebtn mt-1" type="button" name="delete" value="{{ $calculation->id }}" id="deletebtn">
            Sil
        </button><br>
        <button class="tabbtn editbtn mt-1" value="{{ $calculation->id }}" id="editbtn">Düzenle</button><br>
    </td>
</tr>
@endforeach