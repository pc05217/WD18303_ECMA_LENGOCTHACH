let idsp = sessionStorage.getItem("id_sp");

const API_URL = "http://localhost:3000/orders";

let array = document.getElementsByTagName("input");

let [a, b, c, d, e] = array;

axios.get(`${API_URL}/${idsp}`).then(({ data }) => {
  a.value = `${data.customer_name}`;
  b.value = `${data.customer_email}`;
  c.value = `${data.customer_phone_number}`;
  d.value = `${data.customer_address}`;
  e.value = `${data.created_date}`;
});

let edit = () => {
    let status = document.getElementById('status').value; 
    if(status == "chuachon"){
        alert('Vui lòng chọn trạng thái!');
    }else{
    let array2 = document.getElementsByTagName("input");
    let [customer_name, customer_email, customer_phone_number, customer_address, created_date ] = array2;
    let product = {
      customer_name: customer_name.value,
      customer_email: customer_email.value,
      customer_phone_number: customer_phone_number.value,
      customer_address: customer_address.value,
      status: status,
      created_date: created_date.value
    };

    axios.put(`${API_URL}/${idsp}`, product).then((response) => {
      sessionStorage.clear();
      window.location = "order.html";
    });
}

};
