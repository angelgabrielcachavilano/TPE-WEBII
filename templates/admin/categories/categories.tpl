{include file='templates/public/header.tpl'}
<div class="row">
    <div class="col-12">
        <h1 class="titulopp mt-3 mb-3">Nuestras Categorias</h1>
    </div>
    <div class="col-4 "> </div>
    <div class="col-4"></div>
    <div class="col-4 mb-4"><a href="showAddCategory" class="btn btn-info ml-5 mt-4">Agregar una nueva categoria</a>
    </div>

    <div class="col-12">
        <table class="table">
            <thead class="headerCervezas">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" class="adm">ADMIN MOD</th>

                </tr>
            </thead>
            <tbody>
                {foreach $categories as $category}

                <tr>

                    <td class="nombre">{$category->nombre}</td>
                    <td>{$category->descripcion}</td>
                    <td> <a href="{BASE_URL}showEditCategory/{$category->id_categoria}" class="btn btn-warning "> editar </a> - <a href="{BASE_URL}deleteCategory/{$category->id_categoria}" class="btn btn-danger "> borrar </a>

                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{include file='templates/public/footer.tpl'}