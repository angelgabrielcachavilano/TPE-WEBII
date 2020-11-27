"use strict"
document.addEventListener("DOMContentLoaded", star);

function star() {


    function getComment() {
        let id_cerveza = document.querySelector("input[name=idCerveza]").value;
        console.log(id_cerveza);
        fetch('api/comentario/' + id_cerveza)
            .then(response => response.json())
            .then(comments => render(comments))
            .catch(error => console.log(error));
    }

    function render(comments) {

        const container = document.querySelector('#container');

        for (let comment of comments) {
            container.innerHTML +=
                `<td>${comment.contenido}</td>`
            `<td>${comment.puntuacion}</td>`
            `<td>${comment.fecha}</td>`
            `<td>${comment.email}</td>`
        }
    }
    getComment()
}