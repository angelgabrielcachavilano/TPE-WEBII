{literal}
<div id="app">

    <table class="table table-striped tabladecomentarios">
        <thead>
            <th scope="col">Comentario</th>
            <th scope="col">Puntuacion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Correo</th>

        </thead>
        <tbody id="container" v-for="comment in comments">
            <template>
        <td>{{comment.contenido}}</td>
        
        <td>{{comment.puntuacion}}</td>
        <td>{{comment.fecha}}</td>
        <td>{{comment.email}}</td>
    </template >
    `


        </tbody>
</div>
</table>
</div>
{/literal}