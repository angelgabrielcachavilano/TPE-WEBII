{include file='templates/public/header.tpl'}

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form action="editBeer/{$beer->id_cerveza}" method="POST" enctype="multipart/form-data" class="formedit mt-5">
            <h1 class="titleedit">Editar Cerveza</h1>
            <div>
                <label class="editlabel">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ingresa nombre" value="{$beer->nombre}">
            </div>
            <div>
                <label class="editlabel">Descripcion: </label>
                <input type="text" name="descripcion" value='{$beer->descripcion}'>
            </div>
            <div>
                <label class="editlabel">Imagen: </label>
                <img src="{BASE_URL}{$beer->imagen}" width="250px" />
                <input type="file" name="imagen" value="{$beer->imagen}">
            </div>
            <div>
                <label class="editlabel">Precio: </label>
                <input type="text" name="precio" value='{$beer->precio}' />
            </div>
            <div>
                <label class="editlabel">IBU: </label>
                <input type="text" name="ibu" value='{$beer->ibu}' />
            </div>
            <div>
                <label class="editlabel">Alcohol: </label>
                <input type="text" name="alcohol" value='{$beer->alcohol}' />
            </div>
            <div>
                <label class="editlabel">Categoría: </label>
                <select name='categoria'>
            {foreach $categories as $category}
                <option value='{$category->id_categoria}' {if $category->id_categoria === $beer->id_categoria}selected{/if}>{$category->nombre}</option>
            {/foreach}
            </select>
            </div>
            <button type="submit" class="btn btn-success mt-2 mb-2">Guardar </button>
            <a class="btn btn-danger mt-2 mb-2" href="{BASE_URL}showBeer">Cancelar </a>

        </form>
    </div>
    <div class="col-3"></div>

</div>


{include file='templates/public/footer.tpl'}