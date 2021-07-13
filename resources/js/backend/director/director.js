// Dependency Element
const btnSave = document.getElementById('btnSave');
const frmDirector = document.getElementById('frmDirector');

// Dependency Variable
const xhr = new XMLHttpRequest();

// Dependency URL
var urlCreate = `${window.origin}/backend/director/store`;

btnSave.addEventListener('click', function () {
    let frmData = new FormData(frmDirector);
    xhr.open('post', `${urlCreate}`, true);
    xhr.onload = function () {
        if (xhr.status === 200){

        }
    };
    xhr.send(frmData);
});