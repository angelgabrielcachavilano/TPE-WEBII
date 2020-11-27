{include file='templates/public/header.tpl'}
<h4>Usuarios</h4>
<table class="table table-bordered">
    <thead>
        <th scope="col">id_usuario</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Es Admin</th>
        <th scope="col">Acciones</th>
    </thead>
    <tbody>
        {foreach $listUsers as $user}
            <tr>
                <td>{$user->id_usuario}</td>
                <td>{$user->nombre}</td>
                <td>{$user->email}</td>
                <td>{$user->esAdmin}</td>
                <td>
                    {if $user->id_usuario != ADMIN_ID}
                        {if $user->esAdmin == 1}
                            <a href='{BASE_URL}admin/quitarpermisos/{$user->id_usuario}'>Quitar admin</a>
                        {else}
                            <a href='{BASE_URL}admin/darpermisos/{$user->id_usuario}'>Agregar admin</a>
                        {/if}
                        | <a href='{BASE_URL}admin/borrarUsuario/{$user->id_usuario}'>Borrar Usuario</a>
                    {else}
                        No puedes modificar al gran maestro :v
                    {/if}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file='templates/public/footer.tpl'}