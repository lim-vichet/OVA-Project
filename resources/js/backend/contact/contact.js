// Dependency Element
var xhr = new XMLHttpRequest();
var frmContact = document.getElementById('frmContact');
var btnSave = document.getElementById('btnSave');

const address = document.getElementById('address');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const img = document.getElementById('img');

// Dependency Variable
const tableId = 'contactTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var PartnerId = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/contact/contact_insert`;
var urlDisable = `${window.origin}/backend/contact/destroy`;
var urlEdit =  `${window.origin}/backend/contact/edit`;
var urlUpdate = `${window.origin}/backend/contact/update`;


btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmContact);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                address.value = "";
                phone.value = "";
                email.value = "";
                img.filename = "";
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${ContactId}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                ContactId = null;
                address.value = "";
                phone.value = "";
                email.value = "";
                img.filename = "";
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

$(document).on('click', '#btnEdit', function () {
    ContactId = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${ContactId}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            let data = JSON.parse(xhr.responseText);
            address.value = data.address;
            phone.value = data.phone;
            email.value = data.email;
            img.filename = data.img;
            NeworUpdate = 1;
        }
    };
    xhr.send();
});

function reloadDataTabel(tableId) {
    let tableIdl = "#"+tableId;
    $(tableIdl).DataTable().ajax.reload();
}