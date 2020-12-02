"use strict"
document.addEventListener("DOMContentLoaded", star);

function star() {
    document.querySelector("#form-comentario").addEventListener('comentario', addComment);
    console.log(document.getElementById("average"));
    let app = new Vue({
        el: "#app",
        data: {
            subtitle: "Comentarios",
            comentarios: [],
            auth: true,
            promedio: 0,
            admin: false,
        },
        methods: {
            addComentario() {
                this.comentarios.push();
            },
            calculateAverage: function () {
                this.prom = 0;
                this.cont = 0;
                comentario.forEach(element => {
                    prom = prom + Number.parseInt(element.puntuacion);
                    cont++;
                });
                prom = prom / cont;
                console.log(prom);
            }
        }
    });

    // app.component('promedio',{
    //    promedio(){
    //        return promedio; 
    //    }
    // })
    function calculateAverage(comentarios) {
        console.log("HOla");
        let promedio = 0;
        let total = comentarios.lenght;
        for (let comentario of comentarios) {
            promedio = promedio + parseInt(comentario.valoracion);
        }
        return (promedio = promedio / total);
    }

    function getCommentsByBeerID() {
        let id_cerveza = document.querySelector("input[name=idCerveza]").value;
        let prom = document.getElementById("average");
        console.log(id_cerveza);
        fetch("api/comentario/" + id_cerveza)
            .then(response => response.json())
            .then(comentarios => {
                app.comentarios = comentarios;
                let promedio = calculateAverage(comentarios);
                if (promedio >= 0) {
                    prom.innerHTML = promedio;
                } else {
                    prom.innerHTML = "0";
                }
                console.log(promedio);
            })
            .catch(error => console.log('Error en get de la api ' + error + ' app ' + app.comentarios));
    }

    function isAdmin() {
        let esAdmin = document.querySelector("input[name=esAdmin]").value;
        if (esAdmin == 1) {
            app.esAdmin = true;
        }
    }


    function addComment(e) {
        e.preventDefault();

        let data = {
            comentario: document.querySelector("textarea[name=contenido]").value,
            puntaje: document.querySelector("input[name=puntuacion]").value,
            fecha: document.querySelector("input[name=fecha]").value,
            id_usuario: document.querySelector("input[name=idUsuario]").value,
            id_cerveza: document.querySelector("input[name=idCerveza]").value
        }
        console.table(data);
        fetch('api/comentario', {
            method: 'POST',
            headers: { 'content-type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(response => {
            getByID();
        })
        .catch(error => console.log("error addComentario js " + error));
    }

    function deleteComment() {
        // Get atributte esta bien???
        let id = document.querySelector("input[name=idUsuario").value;
        console.log(id);
        fetch('api/comentario/' + id, {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json' }
        })
        .then(function () {
            getComments();
        })
        .catch(error => console.log(error));
    }
}