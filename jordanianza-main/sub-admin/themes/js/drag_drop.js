
var fileobj;
function upload_file(e) {
    e.preventDefault();
    file_upload(e.dataTransfer.files);
}
function selectCategory(){
    let select = document.getElementById('select').value;
    return select;
}
function prev_image(e) {
    e.preventDefault();
    file_upload(e.dataTransfer.files);
}
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function () {
        files = document.getElementById('selectfile').files; 
         let select = selectCategory();
       ajax_file_upload(files,select);
    };
}

 
function ajax_file_upload(file_obj,sub_category) {
    if (file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('sub_category',sub_category);
         for (i = 0; i < file_obj.length; i++) {
            form_data.append('file[]', file_obj[i]);
        } 
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("alert").click();
                $('#selectfile').val('');
                $('#select').val('');
                
            }
        };
        xhttp.open("POST", "upload.php", true);
        xhttp.send(form_data);
    }

}



function get_id_image(){
    let image_id = document.getElementById('image_id').value;
    return image_id; 
    
}
function get_id_video(){
    let video_id = document.getElementById('video_id').value;
    return video_id; 
    
}
function get_id(){
    let id = document.getElementById('id').value;  
    return id; 
    
}

function get_NameCate(){
    let cate_name = document.getElementById('cate_name').value; 
    return cate_name; 
    
}


 
function update_image() {
    document.getElementById('selectedFile').click();
    document.getElementById('selectedFile').onchange = function () {
        files = document.getElementById('selectedFile').files; 
        image_id =get_id_image();
        id =  get_id();
        cate_name = get_NameCate();

       ajax_image_upload(files,image_id,id,cate_name);
    };
}
function ajax_image_upload(file_obj,image_id,id,cate_name) {
    if (file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('image_id', image_id);
        form_data.append('id', id);
        form_data.append('cate_name',cate_name);
         for (i = 0; i < file_obj.length; i++) {
            form_data.append('file[]', file_obj[i]);
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                 $('#selectedFile').val('');  
                 alert(this.responseText);
            }
        };
        xhttp.open("POST", "update_post.php", true);
        xhttp.send(form_data)
    }

}
function update_video() {
    document.getElementById('selectedFile').click();
    document.getElementById('selectedFile').onchange = function () {
        files = document.getElementById('selectedFile').files; 
        video_id =get_id_video();
        id =  get_id();
        cate_name = get_NameCate();

       ajax_video_upload(files,video_id,id,cate_name);
    };
}

function ajax_video_upload(file_obj,video_id,id,cate_name) {
    if (file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('video_id', video_id);
        form_data.append('id', id);
        form_data.append('cate_name',cate_name);
         for (i = 0; i < file_obj.length; i++) {
            form_data.append('file[]', file_obj[i]);
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                 $('#selectedFile').val('');  
                 alert(this.responseText);
            }
        };
        xhttp.open("POST", "update_post.php", true);
        xhttp.send(form_data)
    }

}