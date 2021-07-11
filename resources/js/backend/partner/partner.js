// Dependency Element
var xhr = new XMLHttpRequest();
var frmPartner = document.getElementById('frmPartner');
var btnSave = document.getElementById('btnSave');

// Dependency Variable
const tableId = 'partnerTable';

// Dependency URL
var urlCreate = `${window.origin}/backend/partner/store`;
var urlDisable = `${window.origin}/backend/partner/disable`;


btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmPartner);
    xhr.open('post', urlCreate, true);
    xhr.onload = function () {
        if (xhr.status === 200){
            reloadDataTabel(tableId);
        }
    };
    xhr.send(frmData);
});

$(document).on('click', '#btnDisable', function () {
    xhr.open('get', `${urlDisable}/${$(this).attr('data-id')}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            reloadDataTabel(tableId);
        }
    };
    xhr.send();
});

function reloadDataTabel(tableId) {
    let tableIdl = "#"+tableId;
    $(tableIdl).DataTable().ajax.reload();
}