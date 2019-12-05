<table width="600px" border="0" cellspacing="2" cellpadding="5" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#4A4A4A">
    <tr>
      <td align="center">
        {{-- LOGO --}}
      </td>
      <td>
        <h3>{{ $data->name }}</h3>
        <h3>Contacto</h3>
        <br><strong>Tel. 52 (322) 297-0262</strong> Av. Paseo Cocoteros Lote 53 Villa 8 11 Nuevo Vallarta, Nayarit, 63732 México
      </td>
    </tr>
    <tr bgcolor="#eff0f2">
      <td><strong>Nombre</strong></td>
      <td>{{ $data->name }}</td>
    </tr>
  <tr>
      <td><strong>Apellido</strong></td>
      <td>{{ $data->last_name }}</td>
    </tr>
    <tr bgcolor="#eff0f2">
      <td><strong>Teléfono</strong></td>
      <td>{{ $data->phone }}</td>
    </tr>
    <tr>
      <td><strong>Email</strong></td>
      <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td><strong>Comentario</strong></td>
        <td>{{ $data->comments }}</td>
    </tr>
  </table>
