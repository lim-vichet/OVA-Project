// Dependency Element
var xhr = new XMLHttpRequest();
var frmVideos = document.getElementById('frmVideos');
var btnSave = document.getElementById('btnSave');
var btnCreate = document.getElementById('btnCreate');

const txtVideosTitle = document.getElementById('txtTitle');
const txtVideosDetail = document.getElementById('txtDetail');

// Dependency Variable
const tableId = 'videosTable';
var NeworUpdate = 0; // 0 = New and 1 = Update
var VideosID = null;

// Dependency URL
var urlCreate = `${window.origin}/backend/videos/store`;
var urlDisable = `${window.origin}/backend/videos/disable`;
var urlEdit =  `${window.origin}/backend/videos/edit`;
var urlUpdate = `${window.origin}/backend/videos/update`;

btnSave.addEventListener('click', function (e) {
    const frmData = new FormData(frmVideos);
    if (NeworUpdate === 0){
        xhr.open('post', urlCreate, true);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                txtVideosTitle.value = "";
                txtVideosDetail.value = "";
            }
        };
    }else if (NeworUpdate === 1){
        xhr.open('post', `${urlUpdate}/${VideosID}`);
        xhr.onload = function () {
            if (xhr.status === 200){
                reloadDataTabel(tableId);
                NeworUpdate = 0;
                VideosID = null;
                txtVideosTitle.value = "";
                txtVideosDetail.value = "";
            }
        };
    }
    xhr.send(frmData);
});

$(document).on('click', '#btnDelete', function () {
    xhr.open('get', `${urlDisable}/${$(this).attr('data-id')}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            reloadDataTabel(tableId);
        }
    };
    xhr.send();
});

$(document).on('click', '#btnEdit', function () {
    VideosID = $(this).attr('data-id');
    xhr.open('get', `${urlEdit}/${VideosID}`);
    xhr.onload = function () {
        if (xhr.status === 200){
            let data = JSON.parse(xhr.responseText);
            txtVideosTitle.value = data.title;
            txtVideosDetail.value = data.youtube;
            NeworUpdate = 1;
        }
    };
    xhr.send();
});

function reloadDataTabel(tableId) {
    let tableIdl = "#"+tableId;
    $(tableIdl).DataTable().ajax.reload();
}