// Dependency Element
const btnSave = document.getElementById('btnSave');
const frmStructure = document.getElementById('frmStructure');

// Dependency Variable
const xhr = new XMLHttpRequest();

// Dependency URL
var urlCreate = `${window.origin}/backend/structure/store`;

btnSave.addEventListener('click', function () {
    let frmData = new FormData(frmStructure);
    xhr.open('post', `${urlCreate}`, true);
    xhr.onload = function () {
        if (xhr.status === 200){

        }
    };
    xhr.send(frmData);
});