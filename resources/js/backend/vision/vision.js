// Dependency Element
const btnSave = document.getElementById('btnSave');
const frmVision = document.getElementById('frmVision');

// Dependency Variable
const xhr = new XMLHttpRequest();

// Dependency URL
var urlCreate = `${window.origin}/backend/vision/store`;

btnSave.addEventListener('click', function () {
    let frmData = new FormData(frmVision);
    xhr.open('post', `${urlCreate}`, true);
    xhr.onload = function () {
        if (xhr.status === 200){

        }
    };
    xhr.send(frmData);
});