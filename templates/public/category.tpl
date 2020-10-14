{include file='templates/public/header.tpl'} 

        <h1 class="titulopp mt-3 mb-3">Categoria: {$category->nombre}</h1>

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

                    <tr>
                        <td class="nombre">{$category->nombre}</td>
                        <td>{$category->descripcion}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

{include file='templates/public/footer.tpl'}