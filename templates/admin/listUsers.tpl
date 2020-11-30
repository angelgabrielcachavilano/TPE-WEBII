{include file='templates/public/header.tpl'}
<h4>Usuarios</h4>
<table class="table table-bordered">
    <thead>
        <th scope="col">id_usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Es Admin</th>
        <th scope="col">Acciones</th>
    </thead>
    <tbody>
        {foreach $listUsers as $user}
        <tr>
            <td>{$user->id_user}</td>
            <td>{$user->email}</td>
            <td>{$user->admin}</td>
            <td>
                {if $user->id_user != ADMIN_ID} {if $user->admin == 1}
                <a href='{BASE_URL}setAdminStatus/{$user->id_user}'>Quitar admin</a> {else}
                <a href='{BASE_URL}setAdminStatus/{$user->id_user}'>Agregar admin</a> {/if} | <a href='{BASE_URL}deleteUser/{$user->id_user}'>Borrar Usuario</a> {else} No puedes modificar al gran maestro :v {/if}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{include file='templates/public/footer.tpl'}