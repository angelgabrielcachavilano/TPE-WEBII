{include file='templates/public/header.tpl'}
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 mt-5">

        <form action="editCategory/{$category->id_categoria}" method="POST" class="formeditcat">
            <img src="images/logo.png" width="400" height="300" class="d-inline-block align-top" alt="" loading="lazy">

            <h1 class="tituloeditcat">Editar Categoria</h1>
            <div>
                <label class="editlabeleditcat">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ingresa nombre" value="{$category->nombre}">
            </div>
            <div>
                <label class="editlabeleditcat">Descripcion: </label>
                <input type="text" name="descripcion" placeholder="Ingresa descripción" value="{$category->descripcion}">

            </div>
            <button type="submit" class="btn btn-success mt-2 mb-2">Guardar </button>
            <a class="btn btn-danger mt-2 mb-2" href="{BASE_URL}showCategories">Cancelar </a>
        </form>
    </div>
    <div class="col-3"></div>

</div>

{include file='templates/public/footer.tpl'}