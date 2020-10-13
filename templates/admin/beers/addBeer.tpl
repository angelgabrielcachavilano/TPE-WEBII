{include file='templates/public/header.tpl'}

    <div class="row">
        <div class="col-3 mt-5">
        </div>
        <div class="col-6">
            <form action="addBeer" method="POST" enctype="multipart/form-data" class="addbeerform mt-5">
                <img src="images/logoadd.png" width="auto" height="350" class="d-inline-block align-top" alt="" loading="lazy">
                <h3 class="titleaddbeer">Nueva Cerveza</h3>
                <div>
                    <label class="editlabel">Nombre: </label>
                    <input type="text" name="nombre" placeholder="Ingresa un nombre">
                </div>
                <div>
                    <label class="editlabel">Descripcion: </label>
                    <input type="text" name="descripcion" placeholder="Ingresa una descripcion">
                </div>
                <div>
                    <label class="editlabel">Imagen: </label>
                    <input type="file" name="imagen">
                </div>
                <div>
                    <label class="editlabel">Precio: </label>
                    <input type="text" name="precio" placeholder="Ingresa un precio">
                </div>
                <div>
                    <label class="editlabel">IBU: </label>
                    <input type="text" name="ibu" placeholder="Ingresa un IBU">
                </div>
                <div>
                    <label class="editlabel">Alcohol: </label>
                    <input type="text" name="alcohol" placeholder="Ingresa un % de alchol">
                </div>
                <div>
                    <label class="editlabel">Categoría: </label>
                    <select name='categoria'>
                    {foreach $categories as $category}
                        <option value='{$category->id_categoria}'>{$category->nombre}</option>
                    {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3 mb-3">Guardar </button>
                <a href="{BASE_URL}showBeer" class="btn btn-danger mt-3 mb-3">Cancelar</a>
            </form>
        </div>
        <div class="col-3 mt-5">
        </div>
    </div>

{include file='templates/public/footer.tpl'}