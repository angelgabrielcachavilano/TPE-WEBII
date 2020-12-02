{include file='templates/public/header.tpl'}
<h1 class="titulopp col-12 mt-4">Usuarios</h1>
<table class="table table-bordered textopp col-12">
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
                <a href='{BASE_URL}setAdminStatus/{$user->id_user}' class="btn btn-success">Quitar admin</a> {else}
                <a href='{BASE_URL}setAdminStatus/{$user->id_user}' class="btn btn-warning">Agregar admin</a> {/if} | <a href='{BASE_URL}deleteUser/{$user->id_user}' class="btn btn-danger">Borrar Usuario</a> {else} No puedes modificar al gran maestro
                :v {/if}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{include file='templates/public/footer.tpl'}