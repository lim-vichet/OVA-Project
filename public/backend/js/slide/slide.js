// Dependency Element
var xhr = new XMLHttpRequest();
var frmSlide = document.getElementById('frmSlide');
var btnSave = document.getElementById('btnSave');

// const id = document.getElementById('id');
const name = document.getElementById('name');
const img = document.getElementById('img');

// Dependency Variable
const tableId = 'slideTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var SlideId = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/slide/slide_insert`;
var urlDisable = `${window.origin}/backend/slide/destroy`;
var urlEdit =  `${window.origin}/backend/slide/edit`;
var urlUpdate = `${window.origin}/backend/slide/update`;


btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmSlide);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                // id.value = "";
                name.value = "";
                img.filename = "";
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${SlideId}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                SlideId = null;
                // id.value = "";
                name.value = "";
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
    SlideId = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${SlideId}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            let data = JSON.parse(xhr.responseText);
            id.value = data.id;
            name.value = data.name;
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