{include file='templates/public/header.tpl'} 

    {foreach $category as $cate}
        <h1 class="titulopp mt-3 mb-3">Categoria: {$cate->nombre}</h1>
    {/foreach}

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="headerCervezas">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$category item=cate}
                    <tr>
                        <td class="nombre">{$cate->nombre}</td>
                        <td>{$cate->descripcion}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>

{include file='templates/public/footer.tpl'}