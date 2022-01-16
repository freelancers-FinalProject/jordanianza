

function like(id){
    let btnlike = document.getElementById(id)
    let iconlike    = document.querySelector(".icon_like"+id);
    let numlike = document.querySelector(".num_like"+id);
    if(btnlike.id == id ){
       if(!parseInt( btnlike.dataset.id)){
      iconlike.innerHTML=`<i class="fas fa-heart"></i>`;
      numlike.textContent++;
      btnlike.dataset.id= '1';
      }else{
        btnlike.dataset.id='0';
            iconlike.innerHTML=`<i class="far fa-heart"></i>`;
            numlike.textContent--;
    }
    }
    ajax_rating(id, numlike.textContent);
 
}

function ajax_rating(image_id,numRating) {
    let form_data = new FormData();
        form_data.append('image_id', image_id);
        form_data.append('rating',numRating);
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {  
            }
        };
        xhttp.open("POST", "rating.php", true);
        xhttp.send(form_data)
    

}