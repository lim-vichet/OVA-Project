// Dependency Element
var xhr = new XMLHttpRequest();
var frmUser = document.getElementById('frmUser');
var btnSave = document.getElementById('btnSave');


const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const img = document.getElementById('img');

// Dependency Variable
const tableId = 'userTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var UserId = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/user/user_insert`;
var urlDisable = `${window.origin}/backend/user/destroy`;
var urlEdit =  `${window.origin}/backend/user/edit`;
var urlUpdate = `${window.origin}/backend/user/update`;


btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmUser);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                name.value = "";
                email.value = "";
                password.value = "";
                img.filename = "";
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${UserId}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                UserId = null;
                name.value = "";
                email.value = "";
                password.value = "";
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
    UserId = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${UserId}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            let data = JSON.parse(xhr.responseText);
            id.value = data.id;
            name.value = data.name;
            email.value = data.email;
            password.value = data.password;
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