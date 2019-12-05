<table width="600px" border="0" cellspacing="2" cellpadding="5" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#4A4A4A">
   <tr>
      <td align="center">
        {{-- LOGO --}}
      </td>
      <td>
         <h3>{{ $data->name }}</h3>
         <h3>Restaurante</h3>
         <br><strong>Tel. 52 (322) 297-0262</strong> Av. Paseo Cocoteros Lote 53 Villa 8 11 Nuevo Vallarta, Nayarit, 63732 México
      </td>
   </tr>
   <tr>
      <td><strong>Nombre</strong></td>
      <td>{{ $data->name }}</td>
   </tr>
   <trbgcolor="#eff0f2">
      <td><strong>Apellido</strong></td>
      <td>{{ $data->last_name }}</td>
   </tr>
   <td><strong>Nombre de Restaurante</strong></td>
   <td>{{ $data->restaurant }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Adultos</strong></td>
      <td>{{ $data->adults }}</td>
   </tr>
   <tr>
      <td><strong>Niños</strong></td>
      <td>{{ $data->children }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Email</strong></td>
      <td>{{ $data->email }}</td>
   </tr>
   <tr>
      <td><strong>País</strong></td>
      <td>{{ $data->country }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Estado</strong></td>
      <td>{{ $data->state }}</td>
   </tr>
   <tr>
      <td><strong>Fecha Deseada</strong></td>
      <td>{{ $data->desired_date }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Fecha de Llegada</strong></td>
      <td>{{ $data->arrival_date }}</td>
   </tr>
   <tr>
      <td><strong>Fecha de Partida</strong></td>
      <td>{{ $data->departure_date }}</td>
   </tr>
   <tr bgcolor="#eff0f2">
      <td><strong>Requerimientos Especiales</strong></td>
      <td>{{ $data->special_requirements }}</td>
   </tr>
</table>
