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

let themDonHang = () =>{
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
      let [fullname, email, phone, address, status, datetime] = array;
      let id_rd = Math.floor(Math.random() * 100);
    
      let order = {
        id: id_rd,
        customer_name: fullname.value,
        customer_address: address.value,
        customer_email: email.value,
        customer_phone_number: phone.value,
        created_date: datetime.value,
        status: status.value 
      };
    
      const API_URL = "http://localhost:3000/orders";
    
      axios.post(API_URL, order).then((response) => {
        localStorage.removeItem("giohang");
        window.location = "camon.html";
      });

    
    }     
}