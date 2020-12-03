{include file='templates/public/header.tpl'}


<div class="row  mt-3 mb-3 ">
    <div class="col-2"></div>
    <div class="card col-8 infobeer cartabeer">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6"><img src="{BASE_URL}{$beer->imagen}" class="imgbeerinfo imagec "></div>
            <div class="col-3"></div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{$beer->nombre}
            </h5>
            <p>Tipo: <small>{$beer->categoria_nombre}</small></p>
            <p class="card-text">{$beer->descripcion}</p>
        </div>
        <ul class="list-group list-group-flush ">
            <li class="list-group-item licolor">
                <p><b>PRECIO</b>: ${$beer->precio}</p>
            </li>
            <li class="list-group-item licolor">
                <p><b>IBU</b>: {$beer->ibu}</p>
            </li>
            <li class="list-group-item licolor">
                <p><b>ALCOHOL</b>: {$beer->alcohol}%</p>
            </li>
        </ul>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-3"></div>
                <div class="col-6 addcom mt-2">
                    <form id="form-comentario" class="form-group mt-2">
                        <input type="hidden" name='idCerveza' value='{$beer->id_cerveza}' class="form-control" /> {if $user !== false}
                        <input type="hidden" name='idUsuario' value='{$user->id_user}' class="form-control" /> {/if}
                        <h4 class="form-group">Formulario de comentario</h4>
                        <select name="puntuacion" class="form-control mb-2" required>
                <option hidden selected>Selecciona un puntaje(Por defecto es 1)</option>

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
                        <div>
                            <label>Tu comentario:</label>
                            <textarea name="contenido" rows="5" cols="60" placeholder="Deje su comentario aqui :)"></textarea>
                        </div>
                        {if $user !== false}

                        <button type="submit" value="comentario" name="comentario" class="btn btn-success">Enviar</button> {/if} {if $user == false}
                        <h4>Nuestros usuarios pueden dejarnos sus comentarios :)</h4>
                        {/if}
                    </form>
                </div>
                <div class="col-3"></div>
            </div>

        </div>
    </div>
    <div class="col-2"></div>
</div>




{if ISADMIN === true}
< {include file="vue/comentarioAdmin.vue" } {/if} {if ISADMIN !==true} < {include file="vue/comentario.vue" } {/if} <script src="js/comment.js"></script>
    {include file='templates/public/footer.tpl'}