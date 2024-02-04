let checkForm = () =>{
  let formElm = document.querySelector('.form');
  let inputElm = formElm.querySelectorAll('.form-input');

  for (let i = 0; i < inputElm.length; i++) {
    if(inputElm[i].value === ""){
        inputElm[i].parentElement.querySelector('.error_message').innerText = `Vui lòng nhập ${inputElm[i].placeholder}`;
    }else{
        inputElm[i].parentElement.querySelector('.error_message').innerText = '';
    }
  }
}



let add = () => {
    checkForm();
    let formElm = document.querySelector('.form');
    let error_message = formElm.querySelectorAll('.error_message');
    let array_error = [];
    for (let i = 0; i < error_message.length; i++) {
      array_error.push(error_message[i].innerText);
    }
    let checkError = array_error.every(value => value ==="");
    if(checkError){
      let array = document.getElementsByTagName("input");
      let [name, price, cate_id, detail] = array;
      let image_1 = document.getElementById("image").value;
      let image = image_1.slice(12, 22);
    
      let product = {
        id: Math.floor(Math.random() * 100),
        name: name.value,
        category_id: Number(cate_id.value),
        price: price.value,
        detail: detail.value,
        image: "content/images/" + image,
      };
    
      const API_URL = "http://localhost:3000/products";
    
      axios.post(API_URL, product).then((response) => {
        window.location = "index.html";
      });
    }     
    
};
