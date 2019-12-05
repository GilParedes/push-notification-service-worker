<table width="600px" border="0" cellspacing="2" cellpadding="5" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#4A4A4A">
   <tr>
      <td align="center">
        {{-- LOGO --}}
      </td>
      <td>
         <h3>Luna de Miel</h3>
         <br><strong>Tel. 52 (322) 297-0262</strong> Av. Paseo Cocoteros Lote 53 Villa 8 11 Nuevo Vallarta, Nayarit, 63732 Mexico
      </td>
   </tr>
   <tr>
      <td><strong>Nombre de Contacto</strong></td>
      <td>{{ $data->name }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Nombre de los Novios</strong></td>
      <td>{{ $data->grooms }}</td>
   </tr>
   <td><strong>Fecha Tentativa</strong></td>
   <td>{{ $data->tentative }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Numero de Invitados</strong></td>
      <td>{{ $data->numbwedd }}</td>
   </tr>
   <tr>
      <td><strong>N&uacute;mero de Habitaciones</strong></td>
      <td>{{ $data->roomsnumb }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>N&uacute;mero de Noches</strong></td>
      <td>{{ $data->nightstay }}</td>
   </tr>
   <tr>
      <td><strong>Ciudad</strong></td>
      <td>{{ $data->city }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Tel&eacute;fono</strong></td>
      <td>{{ $data->phone }}</td>
   </tr>
   <tr>
      <td><strong>Email</strong></td>
      <td>{{ $data->email }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Presupuesto</strong></td>
      <td>{{ $data->weddbudg }}</td>
   </tr>
   <tr>
      <td><strong>Requerimientos Especiales</strong></td>
      <td>{{ $data->special_requirements }}</td>
   </tr>
</table>
