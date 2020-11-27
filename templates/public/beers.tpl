{include file='templates/public/header.tpl'}

<h1 class="titulopp mt-3 mb-3">Nuestras Cervezas</h1>
<div class="row">

    <div class="col-4"></div>
    <div class="col-4">
        <div class="form-group ">
            <small class="textfilter">Ordenar por la siguiente categoria:</small>
            <form action="{BASE_URL}showBeerByCategories/" method="POST">
                <select class="form-control selectbeers" name="categorias" id="exampleSelect1">
                    {foreach $categories as $category}
                    <option hidden selected>Selecciona una categoria</option>

                    <option class="selectbeers" value="{$category['id_categoria']}">{$category['nombre']}</option>
                    {/foreach}
                    <option class="selectbeers" value="all">Ver todas</option>

              
            </select>
                <button class="btn btn-danger btnfiltro">Filtrar</button>
            </form>




        </div>
    </div>
    <div class="col-4">

    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead class="headerCervezas">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Ibu</th>
                    <th scope="col">Alcohol</th>
                    {if {$beer->categoria_nombre} === true}
                    <th scope="col">Info</th>
                    {/if}
                    <th scope="col">Categoria</th>
                    <th scope="col">Comentarios</th>

                </tr>
            </thead>
            <tbody>
                {foreach $beers as $beer}

                <tr>

                    <td class="nombre">{$beer->nombre}</td>
                    <td>{$beer->descripcion}</td>
                    <td><img src="{BASE_URL}{$beer->imagen}" alt="" height="200px"></td>
                    <td>{$beer->precio}</td>
                    <td class="ibu">{$beer->ibu}</td>
                    <td class="alcohol">{$beer->alcohol}</td>
                    {if {$beer->categoria_nombre} === true}
                    <td class="alcohol">{$beer->categoria_nombre}</td>
                    {/if}
                    <td>
                        <a href="{BASE_URL}showCategory/{$beer->id_categoria}" class="btn btn-danger ">Ver categoria</a>
                    </td>
                    <td>
                        <a href="{BASE_URL}showBeerDetail/{$beer->id_cerveza}" class="btn btn-info ">Ver comentarios</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{include file='templates/public/footer.tpl'}