document.addEventListener("DOMContentLoaded", star);

function star() {

    let res = document.querySelector('#resultados');
    let navP = document.querySelector('#NavPosicion');
    let pager = new Pager(res, 10);
    pager.init();
    pager.showPageNav(pager, navP);
    pager.showPage(1);
}