{include file='templates/public/header.tpl'}
<div class="row">



    <div class="col-3"></div>
    <div class="col-6">

        <form action="addCategory" method="POST" class="formaddcat mt-5">
            <img src="images/logo.png" width="400" height="300" class="d-inline-block align-top" alt="" loading="lazy">

            <h1 class="tituloaddcat col-12">Nueva Categoria</h1>

            <div>
                <label class="editlabeladdcat">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ingresa nombre">
            </div>
            <div>
                <label class="editlabeladdcat">Descripcion: </label>
                <input type="text" name="descripcion" placeholder="Ingresa descripción">
            </div>
            <button type="submit" class="btn btn-success mt-3 mb-3">Guardar </button>
            <a href="{BASE_URL}showBeer" class="btn btn-danger mt-3 mb-3">Cancelar</a>

        </form>
    </div>


    <div class="col-3"></div>

</div>
{include file='templates/public/footer.tpl'}