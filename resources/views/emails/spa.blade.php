{{ App::setLocale($data->lang) }}
<table width="600px" border="0" cellspacing="2" cellpadding="5"
    style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#4A4A4A">
    <tr>
        <td align="center">
            {{-- LOGO --}}
        </td>
        <td>
            <h3>{{ $data->name }}</h3>
            <h3>Tours</h3>
            <br><strong>Tel. 52 (322) 297-0262</strong> Av. Paseo Cocoteros Lote 53 Villa 8 11 Nuevo Vallarta, Nayarit,
            63732 Mexico
        </td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>Folio</strong></td>
        <td>VD{{ $folio }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.name')</strong></td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.lastName')</strong></td>
        <td>{{ $data->last_name }}</td>
    </tr>
    <td><strong>@lang('distinct/global.spa_name')</strong></td>
    <td>{{ $data->spa_name }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.country')</strong></td>
        <td>{{ $data->country }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.phone')</strong></td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.pref_time')</strong></td>
        <td>{{ $data->pref_time }}</td>
    </tr>
    @if ($data->lang == 'en')
    <tr>
        <td><strong>@lang('distinct/global.preferred')</strong></td>
        <td>{{ \Carbon\Carbon::parse($data->preferred)->toFormattedDateString() }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.secondary')</strong></td>
        <td>{{ \Carbon\Carbon::parse($data->secondary)->toFormattedDateString() }}</td>
    </tr>
    @else
    <tr>
        <td><strong>@lang('distinct/global.preferred')</strong></td>
        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data->preferred)->toFormattedDateString() }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.secondary')</strong></td>
        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y',$data->secondary)->toFormattedDateString() }}</td>
    </tr>
    @endif
    <tr bgcolor="#eff0f2">
        <td><strong>@lang('distinct/global.groupspa')</strong></td>
        <td>{{ $data->group }}</td>
    </tr>
    <tr>
        <td><strong>@lang('distinct/global.comments')</strong></td>
        <td>{{ $data->comments }}</td>
    </tr>
</table>
