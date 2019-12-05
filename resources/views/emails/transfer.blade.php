{{ App::setLocale($data->lang) }}
<table width="600px" border="0" cellspacing="2" cellpadding="5" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#4A4A4A">
    <tr>
        <td align="center">
            {{-- LOGO --}}
        </td>
        <td>
            <h3>Transfer</h3>
            <br><strong>Tel. 52 (322) 297-0262</strong> Av. Paseo Cocoteros Lote 53 Villa 8 11 Nuevo Vallarta, Nayarit, 63732
            México
        </td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>Folio</strong></td>
        <td>VD{{ $folio }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.activity_s')</strong></td>
        <td>Transfer</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>URL</strong></td>
        <td>{{ $data->url }}</td>
    </tr>
    <tr  bgcolor="#eff0f2">
        <td style="border-top: 1px solid gray; border-bottom: 1px solid gray;" colspan="2"><strong>Información de Contacto</strong></td>
     </tr>
    <tr>
        <td><strong>@lang('distinct/global.name')</strong></td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.lastName')</strong></td>
        <td>{{ $data->last_name }}</td>
    </tr>
    <td><strong>@lang('distinct/global.phone')</strong></td>
    <td>{{ $data->phone }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.zipCode')</strong></td>
        <td>{{ $data->zip_code }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.email')</strong></td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.city')</strong></td>
        <td>{{ $data->city }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.state')</strong></td>
        <td>{{ $data->state }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.country')</strong></td>
        <td>{{ $data->country }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.adults')</strong></td>
        <td>{{ $data->adults }}</td>
    </tr>
    @if(is_array($data->children))
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.Children')</strong></td>

        <td>{{ count($data->children) }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.children_age')</strong></td>
        <td>
        @foreach ($data->children as $index => $child)
            Niño-{{ ++$index }}: {{ $child }} @lang('distinct/global.year')<br>
        @endforeach
        </td>
    </tr>
    @endif
    <tr bgcolor="#eff0f2">
        <td style="border-top: 1px solid gray; border-bottom: 1px solid gray;" colspan="2"><strong>@lang('distinct/global.travelInformation')</strong></td>
    </tr>
    @if ($data->lang == 'en')
    <tr>
        <td><strong>@lang('distinct/global.arrivalDate')</strong></td>
        <td>{{ \Carbon\Carbon::parse($data->arrival_date)->toFormattedDateString() }}</td>
    </tr>
    @else
    <tr>
        <td><strong>@lang('distinct/global.arrivalDate')</strong></td>
        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data->arrival_date)->toFormattedDateString() }}</td>
    </tr>
    @endif
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.arrival_airline')</strong></td>
        <td>{{ $data->arrival_airline }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.arrival_flight_number')</strong></td>
        <td>{{ $data->arrival_flight_number }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.arrival_time')</strong></td>
        <td>{{ $data->arrival_time }}</td>
    </tr>
    @if ($data->lang == 'en')
    <tr>
        <td><strong>@lang('distinct/global.departureDate')</strong></td>
        <td>{{ \Carbon\Carbon::parse($data->departure_date)->toFormattedDateString() }}</td>
    </tr>
    @else
    <tr>
        <td><strong>@lang('distinct/global.departureDate')</strong></td>
        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data->departure_date)->toFormattedDateString() }}</td>
    </tr>
    @endif
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.departure_airline')</strong></td>
        <td>{{ $data->departure_airline }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.departure_flight_number')</strong></td>
        <td>{{ $data->departure_flight_number }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.departure_time')</strong></td>
        <td>{{ $data->departure_time }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td style="border-top: 1px solid gray; border-bottom: 1px solid gray;" colspan="2"><strong>@lang('distinct/global.especial')</strong></td>
    </tr>
    <tr>
        <td colspan="2">{{ $data->special_requirements }}</td>
    </tr>
</table>
