"use strict"
document.addEventListener("DOMContentLoaded", star);




function star() {

    let app = new Vue({
        el: '#app',
        data: {
            comments: []
        },
        methods: {
            deleteComment: function(mensaje) {
                fetch('api/deleteComentario/' + mensaje, {
                        method: 'DELETE',
                        headers: { 'Content-Type': 'application/json' }
                    })
                    .then(function() {
                        getComments();
                    })
                    .catch(error => console.log(error));
            }

        }
    });


    getComments();
    document.querySelector('#form-comentario').addEventListener('submit', e => {
        e.preventDefault();
        addComment();
    });




    function getComments() {

        let id_cerveza = document.querySelector("input[name=idCerveza]").value;
        fetch('api/comentarios/' + id_cerveza)
            .then(response => response.json())
            .then(commentsFetch => app.comments = commentsFetch)
            .catch(error => console.log(error));

    }


    function addComment() {

        let fecha = new Date();


        let contenido = document.querySelector('textarea[name=contenido]').value;
        let puntuacion = document.querySelector('select[name=puntuacion]').value;
        let id_cerveza = document.querySelector('input[name=idCerveza]').value;
        let id_usuario = document.querySelector('input[name=idUsuario]').value;

        if (puntuacion === "Selecciona un puntaje(Por defecto es 1)") {

            puntuacion = 1;
        }


        const comment = {
            contenido: contenido,
            puntuacion: puntuacion,
            fecha: fecha,
            id_cerveza: id_cerveza,
            id_usuario: id_usuario
        }



        console.log(comment);
        fetch('api/comentarios', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comment)
            })
            .then(response => response.json())
            .then(function() {
                getComments();
            })
            .catch(error => console.log(error))
    }




}