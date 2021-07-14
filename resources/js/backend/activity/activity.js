// Dependency Element
var xhr = new XMLHttpRequest();
var frmActivity = document.getElementById('frmActivity');
var btnSave = document.getElementById('btnSave');
var btnCreate = document.getElementById('btnCreate');

const txtActivityTitle = document.getElementById('txtTitle');
const txtActivityThumbnail = document.getElementById('txtThumbnail');
const txtActivityDetail = document.getElementById('txtDetail');

// Dependency Variable
const tableId = 'activityTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var ActivityId = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/activity/store`;
var urlDisable = `${window.origin}/backend/activity/disable`;
var urlEdit =  `${window.origin}/backend/activity/edit`;
var urlUpdate = `${window.origin}/backend/activity/update`;


btnCreate.addEventListener('click', function () {
    document.getElementsByClassName('entry-form-contain')[0].style.display = 'block';
});

btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmActivity);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                txtActivityTitle.value = "";
                txtActivityThumbnail.filename = "";
                $('#txtDetail').summernote('code', '');
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${ActivityId}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                ActivityId = null;
                txtActivityTitle.value = "";
                txtActivityThumbnail.filename = "";
                $('#txtDetail').summernote('code', '');
                document.getElementsByClassName('entry-form-contain')[0].style.display = 'none';
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
    ActivityId = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${ActivityId}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            document.getElementsByClassName('entry-form-contain')[0].style.display = 'block';
            let data = JSON.parse(xhr.responseText);
            txtActivityTitle.value = data.title;
            txtActivityThumbnail.filename = data.thumbnail;
            $('#txtDetail').summernote('code', data.detail);
            NeworUpdate = 1;
        }
    };
    xhr.send();
});

function reloadDataTabel(tableId) {
    let tableIdl = "#"+tableId;
    $(tableIdl).DataTable().ajax.reload();
}