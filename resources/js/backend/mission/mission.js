// Dependency Element
const btnSave = document.getElementById('btnSave');
const frmMission = document.getElementById('frmMission');

// Dependency Variable
const xhr = new XMLHttpRequest();

// Dependency URL
var urlCreate = `${window.origin}/backend/mission/store`;

btnSave.addEventListener('click', function () {
    let frmData = new FormData(frmMission);
    xhr.open('post', `${urlCreate}`, true);
    xhr.onload = function () {
        if (xhr.status === 200){

        }
    };
    xhr.send(frmData);
});