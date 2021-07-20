// Dependency Element
var xhr = new XMLHttpRequest();
var frmPartner = document.getElementById('frmPartner');
var btnSave = document.getElementById('btnSave');

const txtPartnerName = document.getElementById('txtPartnerName');
const txtPartnerLogo = document.getElementById('txtPartnerLogo');

// Dependency Variable
const tableId = 'partnerTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var PartnerId = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/partner/store`;
var urlDisable = `${window.origin}/backend/partner/disable`;
var urlEdit =  `${window.origin}/backend/partner/edit`;
var urlUpdate = `${window.origin}/backend/partner/update`;


btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmPartner);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                txtPartnerName.value = "";
                txtPartnerLogo.filename = "";
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${PartnerId}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                PartnerId = null;
                txtPartnerName.value = "";
                txtPartnerLogo.filename = "";
            }
        };
    }
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
var btnEdit = document.getElementsByClassName('btnEdit');
Array.from(btnEdit).forEach(function () {

});

$(document).on('click', '#btnEdit', function () {
    PartnerId = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${PartnerId}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            let data = JSON.parse(xhr.responseText);
            txtPartnerName.value = data.name;
            txtPartnerLogo.filename = data.logo;
            NeworUpdate = 1;
        }
    };
    xhr.send();
});

function reloadDataTabel(tableId) {
    let tableIdl = "#"+tableId;
    $(tableIdl).DataTable().ajax.reload();
}